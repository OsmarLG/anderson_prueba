<?php
include_once(__DIR__.'/../../../models/Task.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskName = $_POST['name'];
    $taskDescription = $_POST['description'];
    $projectId = $_POST['project_id'];

    if (empty($taskName)) {
        echo json_encode(['success' => false, 'error' => 'El nombre de la tarea es obligatoria.']);
        exit();
    }

    $taskModel = new Task();

    try {
        $taskId = $taskModel->createTask($taskName, $taskDescription, $projectId);

        echo json_encode(['success' => true, 'id' => $taskId]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método de solicitud no válido.']);
}
?>
