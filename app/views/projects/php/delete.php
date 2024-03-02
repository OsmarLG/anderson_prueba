<?php
include_once(__DIR__.'/../../../models/Project.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    if (empty($id)) {
        echo json_encode(['success' => false, 'error' => 'Proyecto no encontrado.']);
        exit();
    }

    $projectModel = new Project();

    try {
        $projectModel->destroy($id);

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método de solicitud no válido.']);
}
?>
