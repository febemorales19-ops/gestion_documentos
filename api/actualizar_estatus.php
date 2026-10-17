<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

$id      = (int) ($_POST['id'] ?? 0);
$estatus = trim($_POST['estatus'] ?? '');

$validos = ['Recibido', 'En proceso', 'Atendido'];

if ($id <= 0 || !in_array($estatus, $validos, true)) {
    http_response_code(422);
    echo json_encode(['error' => 'Datos inválidos.']);
    exit;
}

$stmt = $pdo->prepare("UPDATE documentos SET estatus = :estatus WHERE id = :id");
$stmt->execute([':estatus' => $estatus, ':id' => $id]);

echo json_encode(['ok' => true, 'mensaje' => 'Estatus actualizado.']);
