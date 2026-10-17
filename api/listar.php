<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

$q       = trim($_GET['q'] ?? '');
$estatus = trim($_GET['estatus'] ?? '');
$desde   = trim($_GET['desde'] ?? '');
$hasta   = trim($_GET['hasta'] ?? '');

$condiciones = [];
$params = [];

if ($q !== '') {
    $condiciones[] = "(no_oficio LIKE :q OR asunto LIKE :q OR remitente LIKE :q OR destinatario LIKE :q)";
    $params[':q'] = '%' . $q . '%';
}
if ($estatus !== '' && $estatus !== 'Todos') {
    $condiciones[] = "estatus = :estatus";
    $params[':estatus'] = $estatus;
}
if ($desde !== '') {
    $condiciones[] = "fecha >= :desde";
    $params[':desde'] = $desde;
}
if ($hasta !== '') {
    $condiciones[] = "fecha <= :hasta";
    $params[':hasta'] = $hasta;
}

$sql = "SELECT id, no_oficio, fecha, asunto, remitente, destinatario, estatus, archivo, archivo_tipo,
               (archivo_datos IS NOT NULL) AS tiene_archivo, notas, creado_en FROM documentos";
if (count($condiciones) > 0) {
    $sql .= " WHERE " . implode(' AND ', $condiciones);
}
$sql .= " ORDER BY fecha DESC, id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$documentos = $stmt->fetchAll();

echo json_encode(['ok' => true, 'data' => $documentos, 'total' => count($documentos)]);
