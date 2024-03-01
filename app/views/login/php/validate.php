<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = 'localhost';
    $dbname = 'crud_prueba';
    $db_username = 'root';
    $db_password = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$_POST['user']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($_POST['pass'], $user['password'])) {
            $_SESSION['user'] = [
                'username' => $user['username'],
                'name' => $user['name'],
                'rol' => $user['rol']
            ];

            echo json_encode(['success' => true]);
            exit();
        } else {
            http_response_code(400);
            echo json_encode(['error' => 'Nombre de usuario o contraseña incorrectos']);
            exit();
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Error al conectar con la base de datos: ' . $e->getMessage()]);
        exit();
    }
}
?>