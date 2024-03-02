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
                        <a href="<?php echo controller::$rutaAPP ?>index.php?action=edit_project&id=<?php echo $proyecto[0]['id']; ?>" class="btn btn-primary mr-2">Editar</a>
                        <button class="btn btn-danger btn-eliminar-proyecto" data-id="<?php echo $proyecto[0]['id']; ?>">Eliminar</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="container mt-5">
            <h2>Tareas del Proyecto</h2>
            <?php if ($_SESSION['user']['rol'] == 'ADMIN' || $_SESSION['user']['rol'] == 'EDITOR'): ?>
                <a href="<?php echo controller::$rutaAPP ?>index.php?action=create_task&project_id=<?php echo $proyecto[0]['id']; ?>" class="btn btn-primary mt-3">Agregar Nueva Tarea</a>
                <br>
                <br>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Tareas:</h6>
                    <?php if (isset($tasks) && count($tasks) > 0): ?>
                        <div class="row">
                            <?php foreach ($tasks as $task): ?>
                                <div class='col-md-4 mb-3'>
                                    <div class='task card'>
                                        <div class='card-body'>
                                            <h5 class="card-title"><?php echo htmlspecialchars($task['name']); ?></h5>
                                            <p class='card-text'><b>Estado:</b> <?php echo htmlspecialchars($task['status']); ?></p>
                                            <p class="card-text"><?php echo htmlspecialchars($task['description']); ?></p>
                                            <label>Cambiar Estado</label>
                                            <select class='form-control estado-select' data-task-id='<?php echo htmlspecialchars($task['id']); ?>'>
                                                <option value='' selected disabled>--Selecciona una Opcion--</option>
                                                <option value='Nueva' <?php echo ($task['status'] == 'Nueva' ? 'selected' : ''); ?>>Nueva</option>
                                                <option value='En Proceso' <?php echo ($task['status'] == 'En Proceso' ? 'selected' : ''); ?>>En Proceso</option>
                                                <option value='Terminada' <?php echo ($task['status'] == 'Terminada' ? 'selected' : ''); ?>>Terminada</option>
                                                <?php if ($_SESSION['user']['rol'] == 'ADMIN'): ?>
                                                    <option value='Validado' <?php echo ($task['status'] == 'Validado' ? 'selected' : ''); ?>>Validado</option>
                                                <?php endif; ?>
                                            </select>                                        
                                            <?php if ($_SESSION['user']['rol'] == 'ADMIN' || $_SESSION['user']['rol'] == 'EDITOR'): ?>
                                                <br>
                                                <a href="<?php echo controller::$rutaAPP ?>index.php?action=edit_task&task_id=<?php echo htmlspecialchars($task['id']); ?>&project_id=<?php echo $proyecto[0]['id']; ?>" class='btn btn-primary btn-sm mb-2 mr-2'>Editar</a>
                                                <button class='btn btn-danger btn-sm mb-2 btn-eliminar-tarea' data-task-id='<?php echo htmlspecialchars($task['id']); ?>'>Eliminar</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class='col-md-12'>
                            <p>No hay tareas disponibles.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
    <?php else: ?>
        <p class="text-center">Proyecto No Encontrado.</p>
    <?php endif; ?>

<?php
include_once $viewPath . '/layouts/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-eliminar-proyecto').click(function() {
            var projectId = $(this).data('id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, elimínalo'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo controller::$rutaAPP ?>index.php?action=delete_project",
                        type: "POST",
                        data: { id: projectId },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Proyecto eliminado',
                                text: 'El Proyecto ha sido eliminado correctamente.',
                                showConfirmButton: false,
                                timer: 1500 
                            }).then(() => {
                                window.location.href = "<?php echo controller::$rutaAPP ?>index.php?action=home";
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un problema al eliminar el proyecto. Por favor, inténtalo de nuevo más tarde.'
                            });
                        }
                    });
                }
            });
        });

        $('.btn-eliminar-tarea').click(function() {
            var taskId = $(this).closest('.card-body').find('.estado-select').data('task-id');
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'Esta acción eliminará la tarea con ID: '+ taskId +'. ¿Quieres continuar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar tarea',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo controller::$rutaAPP ?>index.php?action=delete_task",
                        type: "POST",
                        data: { id: taskId },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Tarea eliminada',
                                text: 'La tarea ha sido eliminada correctamente.',
                                showConfirmButton: false,
                                timer: 1500 
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Hubo un problema al eliminar la tarea. Por favor, inténtalo de nuevo más tarde.'
                            });
                        }
                    });
                }
            });
        });

        $('.estado-select').change(function() {
                var taskId = $(this).closest('.card-body').find('.estado-select').data('task-id');
                var newStatus = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: '<?php echo controller::$rutaAPP ?>index.php?action=update_status_task', 
                    data: {
                        task_id: taskId,
                        new_status: newStatus
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: '¡Estado actualizado!',
                            text: 'El estado de la tarea ha sido actualizado correctamente.',
                            showConfirmButton: false,
                            timer: 1100 
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema al actualizar el estado de la tarea. Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            });
    });
</script>