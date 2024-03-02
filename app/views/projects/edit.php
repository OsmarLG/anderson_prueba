<?php
$viewPath = dirname(__DIR__);

include_once $viewPath . '/layouts/header.php';
?> 

    <div class="container mt-5">
        <h2>Editar Proyecto</h2>
        <form id="editarProyectoForm">
            <div class="form-group">
                <label for="name">Nombre del Proyecto:</label>
                <input type="hidden" name="id" id="id" value="<?php echo $proyecto[0]['id']; ?>">
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $proyecto[0]['name']; ?>" required autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
            window.location.href = "<?php echo controller::$rutaAPP?>index.php?action=show_project&id=<?php echo $proyecto[0]['id']; ?>";
        });
    });

    $('#editarProyectoForm').submit(function(event){
        event.preventDefault();
        $.ajax({
            dataType:"json",
            url:"<?php echo controller::$rutaAPP?>index.php?action=update_project",
            type:"POST",
            data:{name:$('#name').val(), id:$('#id').val()},
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Projecto Editado!',
                        text: '¡Projecto Editado con Exito!',
                        timer: 800, 
                        showConfirmButton: false 
                    }).then(function() {
                        window.location.href = "<?php echo controller::$rutaAPP?>index.php?action=show_project&id=<?php echo $proyecto[0]['id']; ?>";
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
                    text: 'Hubo un problema al editar el proyecto. Por favor, inténtalo de nuevo más tarde.'
                });
            }
        });
    });
</script>