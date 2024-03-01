<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Iniciar sesión</h2>
                        <form id="loginForm" method="post">
                            <div class="form-group">
                                <label for="username">Usuario:</label>
                                <input type="text" id="username" name="username" class="form-control" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                            <div class="text-center mt-3">
                                <p class="mb-0">¿No tienes cuenta? <a href="register.php">Regístrate aquí</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
include_once $viewPath . '/layouts/footer.php';
?>
