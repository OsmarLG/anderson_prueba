<?php
include_once(__DIR__.'/../../../models/Task.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskStatus = $_POST['new_status'];
    $taskId = $_POST['task_id'];

    if (empty($taskId)) {
        echo json_encode(['success' => false, 'error' => 'ID de tarea no definida.']);
        exit();
    }

    $taskModel = new Task();

    try {
        $taskModel->updateStatusTask($taskStatus, $taskId);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método de solicitud no válido.']);
}
?>
