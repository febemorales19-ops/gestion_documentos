<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

$no_oficio    = trim($_POST['no_oficio'] ?? '');
$fecha        = trim($_POST['fecha'] ?? '');
$asunto       = trim($_POST['asunto'] ?? '');
$remitente    = trim($_POST['remitente'] ?? '');
$destinatario = trim($_POST['destinatario'] ?? '');
$estatus      = trim($_POST['estatus'] ?? 'Recibido');
$notas        = trim($_POST['notas'] ?? '');

if ($no_oficio === '' || $fecha === '' || $asunto === '' || $remitente === '' || $destinatario === '') {
    http_response_code(422);
    echo json_encode(['error' => 'No. de oficio, fecha, asunto, remitente y destinatario son obligatorios.']);
    exit;
}

// ---------- Manejo del archivo adjunto (opcional) ----------
const MAX_BYTES = 1048576; // 1 MB

function detectarTipo($ruta) {
    // Revisamos los primeros bytes del archivo ("firma") para no fiarnos solo de la extensión
    $cab = file_get_contents($ruta, false, null, 0, 12);
    if (substr($cab, 0, 4) === '%PDF') return 'application/pdf';
    if (substr($cab, 0, 3) === "\xFF\xD8\xFF") return 'image/jpeg';
    if (substr($cab, 0, 8) === "\x89PNG\r\n\x1a\n") return 'image/png';
    if (substr($cab, 0, 4) === 'RIFF' && substr($cab, 8, 4) === 'WEBP') return 'image/webp';
    return null;
}

$archivoNombre = null;
$archivoTipo   = null;
$archivoDatos  = null;

if (isset($_FILES['documento']) && $_FILES['documento']['error'] !== UPLOAD_ERR_NO_FILE) {
    $f = $_FILES['documento'];

    if ($f['error'] !== UPLOAD_ERR_OK) {
        http_response_code(422);
        echo json_encode(['error' => 'No se pudo recibir el archivo. Intenta con uno más pequeño (máx. 1 MB).']);
        exit;
    }
    if ($f['size'] > MAX_BYTES) {
        http_response_code(422);
        echo json_encode(['error' => 'El archivo pesa más de 1 MB.']);
        exit;
    }
    $tipo = detectarTipo($f['tmp_name']);
    if ($tipo === null) {
        http_response_code(422);
        echo json_encode(['error' => 'Formato no permitido. Solo PDF, JPG, PNG o WEBP.']);
        exit;
    }

    $archivoNombre = substr(preg_replace('/[^A-Za-z0-9._ -]/', '_', basename($f['name'])), 0, 200);
    $archivoTipo   = $tipo;
    $archivoDatos  = file_get_contents($f['tmp_name']);
}

$sql = "INSERT INTO documentos (no_oficio, fecha, asunto, remitente, destinatario, estatus, archivo, archivo_tipo, archivo_datos, notas)
        VALUES (:no_oficio, :fecha, :asunto, :remitente, :destinatario, :estatus, :archivo, :archivo_tipo, :archivo_datos, :notas)";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':no_oficio', $no_oficio);
$stmt->bindValue(':fecha', $fecha);
$stmt->bindValue(':asunto', $asunto);
$stmt->bindValue(':remitente', $remitente);
$stmt->bindValue(':destinatario', $destinatario);
$stmt->bindValue(':estatus', $estatus);
$stmt->bindValue(':archivo', $archivoNombre);
$stmt->bindValue(':archivo_tipo', $archivoTipo);
$stmt->bindValue(':archivo_datos', $archivoDatos, $archivoDatos === null ? PDO::PARAM_NULL : PDO::PARAM_LOB);
$stmt->bindValue(':notas', $notas);
$stmt->execute();

echo json_encode(['ok' => true, 'id' => $pdo->lastInsertId(), 'mensaje' => 'Documento registrado correctamente.']);
