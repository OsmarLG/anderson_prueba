<?php
include_once(__DIR__.'/../../../models/Task.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['name'];
    $taskDescription = $_POST['description'];
    $taskId = $_POST['task_id'];

    if (empty($taskName)) {
        echo json_encode(['success' => false, 'error' => 'El nombre del proyecto es obligatorio.']);
        exit();
    }
    if (empty($taskId)) {
        echo json_encode(['success' => false, 'error' => 'ID de tarea no definida.']);
        exit();
    }

    $taskModel = new Task();

    try {
        $taskModel->updateTask($taskName, $taskDescription, $taskId);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método de solicitud no válido.']);
}
?>
