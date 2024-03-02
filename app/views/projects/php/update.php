<?php
include_once(__DIR__.'/../../../models/Project.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectName = $_POST['name'];
    $projectId = $_POST['id'] ?? null;

    if (empty($projectId)) {
        echo json_encode(['success' => false, 'error' => 'ID de proyecto nulo.']);
        exit();
    }
    if (empty($projectName)) {
        echo json_encode(['success' => false, 'error' => 'El nombre del proyecto es obligatorio.']);
        exit();
    }

    $projectModel = new Project();

    try {
        $projectModel->updateProject($projectId, $projectName);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método de solicitud no válido.']);
}
?>
