<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Registro</h2>
                        <form id="registerForm">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="username">Usuario:</label>
                                <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirmar contraseña:</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="rol">Rol:</label>
                                <select name="rol" id="rol" class="form-control">
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="EDITOR">EDITOR</option>
                                    <option value="WORKER">WORKER</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                        </form>
                        <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="<?php echo controller::$rutaAPP?>index.php?action=login">Inicia sesión</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php
include_once $viewPath . '/layouts/footer.php';
?>
