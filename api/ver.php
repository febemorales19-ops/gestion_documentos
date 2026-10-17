<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

$id = (int) ($_GET['id'] ?? 0);
if ($id <= 0) {
    http_response_code(422);
    echo json_encode(['error' => 'ID inválido.']);
    exit;
}

$stmt = $pdo->prepare("SELECT archivo, archivo_tipo, archivo_datos FROM documentos WHERE id = :id");
$stmt->execute([':id' => $id]);
$doc = $stmt->fetch();

if (!$doc || $doc['archivo_datos'] === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Este documento no tiene archivo adjunto.']);
    exit;
}

echo json_encode([
    'ok'     => true,
    'nombre' => $doc['archivo'],
    'tipo'   => $doc['archivo_tipo'],
    'base64' => base64_encode($doc['archivo_datos']),
]);
