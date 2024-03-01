    <br>
    <br>
    <footer class="footer fixed-bottom bg-primary text-white">
        <div class="container-fluid">
            <p class="text-center m-0">&copy; 2024 Proyectos & Tareas</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#loginForm').submit(function(event){
                event.preventDefault();
                $.ajax({
                    dataType:"json",
                    url:"<?php echo controller::$rutaAPP?>index.php?action=validate",
                    type:"POST",
                    data:{user:$('#username').val(), pass:$('#password').val()},
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Inicio de sesión exitoso!',
                                text: '¡Bienvenido!',
                                timer: 800, 
                                showConfirmButton: false 
                            }).then(function() {
                                window.location.href = "<?php echo controller::$rutaAPP?>index.php?action=home";
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
                            text: 'Hubo un problema al iniciar sesión. Por favor, inténtalo de nuevo más tarde.'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>