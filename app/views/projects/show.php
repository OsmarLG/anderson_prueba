<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?> 

    <?php if (isset($proyecto)): ?>
        <div class="container mt-5">
            <h2>Detalles del Proyecto</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $proyecto[0]['name']; ?></h5>
                    <?php if ($_SESSION['user']['rol'] == 'ADMIN'): ?>
                        <a href="edit.php?id=<?php echo $proyecto[0]['id']; ?>" class="btn btn-primary mr-2">Editar</a>
                        <button onclick="eliminarProyecto(<?php echo $proyecto[0]['id']; ?>)" class="btn btn-danger">Eliminar</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>    
    <?php else: ?>
        <p class="text-center">Proyecto No Encontrado.</p>
    <?php endif; ?>

<?php
include_once $viewPath . '/layouts/footer.php';
?>