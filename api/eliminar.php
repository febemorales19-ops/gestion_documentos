<?php
require_once __DIR__ . '/../db.php';
header('Content-Type: application/json');

$id = (int) ($_POST['id'] ?? $_GET['id'] ?? 0);

if ($id <= 0) {
    http_response_code(422);
    echo json_encode(['error' => 'ID inválido.']);
    exit;
}

$stmt = $pdo->prepare("DELETE FROM documentos WHERE id = :id");
$stmt->execute([':id' => $id]);

if ($stmt->rowCount() > 0) {
    echo json_encode(['ok' => true, 'mensaje' => 'Documento eliminado.']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'No se encontró ese documento.']);
}
