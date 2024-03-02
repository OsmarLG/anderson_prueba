<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?> 

    <div class="container mt-5">
        <h2>Editar tarea</h2>
        <form id="editartareaForm">
            <input type="hidden" id="task_id" name="task_id" value="<?php echo $task_id; ?>">
            <div class="form-group">
                <label for="name">Nombre de la Tarea:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $task[0]['name'] ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" class="form-control" required autocomplete="off"><?php echo $task[0]['description'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Tarea</button>
            <button id="cancelar" class="btn btn-warning text-white">Cancelar</button>
        </form>
    </div>

<?php
include_once $viewPath . '/layouts/footer.php';
?>

<script type="text/javascript">
    $(document).ready(function () {
        $('#cancelar').click(function() {
            event.preventDefault();
            window.location.href = "<?php echo controller::$rutaAPP?>index.php?action=show_project&id=<?php echo $project_id; ?>";
        });
    });

    $('#editartareaForm').submit(function(event){
        event.preventDefault();
        $.ajax({
            dataType:"json",
            url:"<?php echo controller::$rutaAPP?>index.php?action=update_task",
            type:"POST",
            data:{
                name:$('#name').val(),
                description:$('#description').val(),
                task_id:$('#task_id').val(),
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'La tarea ha sido actualizada correctamente.',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = "<?php echo controller::$rutaAPP?>index.php?action=show_project&id=<?php echo $project_id; ?>";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.error
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un error al actualizar la tarea. Por favor, inténtalo de nuevo más tarde.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
</script>