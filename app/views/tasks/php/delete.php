<?php
include_once(__DIR__.'/../../../models/Task.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (empty($id)) {
        echo json_encode(['success' => false, 'error' => 'Tarea no encontrado.']);
        exit();
    }

    $taskModel = new Task();

    try {
        $taskModel->destroy($id);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método de solicitud no válido.']);
}
?>
