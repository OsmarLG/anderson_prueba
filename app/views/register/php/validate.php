<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $name = $_POST['name'];
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $confirm_password = $_POST['confirm_pass'];
        $rol = $_POST['rol'];

        if ($password !== $confirm_password) {
            echo 'Las contraseñas no coinciden';
            exit();
        }

        $host = 'localhost';
        $dbname = 'crud_prueba';
        $db_username = 'root';
        $db_password = '';

        try {
            $db = new PDO("mysql:host=$host;dbname=$dbname", $db_username, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $checkUser = $db->prepare("SELECT * FROM users WHERE username = :username");
            $checkUser->execute([':username' => $username]);
            $userExists = $checkUser->fetch(PDO::FETCH_ASSOC);

            if ($userExists) {
                echo json_encode(['success' => false, 'error' => 'El nombre de usuario ya está en uso.']);
                exit();
            }
        
            $stmt = $db->prepare("INSERT INTO users (name, username, password, rol) VALUES (:name, :username, :password, :rol)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([':name' => $name, ':username' => $username, ':password' => $hashed_password, ':rol' => $rol]);
            
            $_SESSION['user'] = [
                'name' => $name,
                'username' => $username,
                'rol' => $rol
            ];

            echo json_encode(['success' => true]);

        } catch (PDOException $e) {
            echo 'Error al registrar el usuario: ' . $e->getMessage();
        }
    } else {
        echo 'Error: No se recibieron datos del formulario';
    }
?>
