<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?> 

    <div class="container mt-5">
        <h2>Proyectos</h2>
        <br>
        <?php if ($_SESSION['user']['rol'] == 'ADMIN'): ?>
            <a href="<?php echo controller::$rutaAPP?>index.php?action=create_project" class="btn btn-primary">Crear Nuevo Proyecto</a>
            <br>
            <br>
        <?php endif; ?>
        
        <?php if (count($proyectos) > 0): ?>
            <div class="row">
                <?php foreach ($proyectos as $proyecto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $proyecto['name']; ?></h5>
                                <a href="<?php echo controller::$rutaAPP?>index.php?action=show_project&id=<?php echo $proyecto['id']; ?>" class="btn btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">No hay proyectos creados.</p>
        <?php endif; ?>
    </div>

<?php
include_once $viewPath . '/layouts/footer.php';
?>
