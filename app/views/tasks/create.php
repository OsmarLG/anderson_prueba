<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?> 

    <div class="container mt-5">
        <h2>Agregar Nueva Tarea</h2>
        <form id="agregarTareaForm">
            <input type="hidden" id="project_id" name="project_id" value="<?php echo $project_id; ?>">
            <div class="form-group">
                <label for="name">Nombre de la Tarea:</label>
                <input type="text" id="name" name="name" class="form-control" required autocomplete="off">
            </div>
            <div class="form-group">
                <label for="description">Descripción:</label>
                <textarea id="description" name="description" class="form-control" required autocomplete="off"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Tarea</button>
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

    $('#agregarTareaForm').submit(function(event){
        event.preventDefault();
        $.ajax({
            dataType:"json",
            url:"<?php echo controller::$rutaAPP?>index.php?action=store_task",
            type:"POST",
            data:{
                name:$('#name').val(),
                description:$('#description').val(),
                project_id:$('#project_id').val(),
            },
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Tarea Agregada',
                        text: 'La tarea se ha agregado correctamente.',
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
                    text: 'Hubo un error al agregar la tarea. Por favor, inténtalo de nuevo más tarde.',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    });
</script>