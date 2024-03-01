<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <?php if(basename($_SERVER['PHP_SELF']) != 'index.php'): ?>
            <a class="navbar-brand" href="#">Proyectos & Tareas</a>
            <?php else : ?>
                <a class="navbar-brand" href="<?php echo controller::$rutaAPP?>index.php?action=home">Proyectos & Tareas</a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text mr-3 text-white">¡Hola, <?php echo $_SESSION['user']['username']; ?>!</span>
                </li>
                <?php if(basename($_SERVER['PHP_SELF']) != '#'): ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?php echo controller::$rutaAPP?>index.php?action=home">Home</a>
                </li>
                <?php endif; ?>
                <?php if(basename($_SERVER['PHP_SELF']) != '#'): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo controller::$rutaAPP?>index.php?action=logout">Cerrar sesión</a>
                    </li>                    
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Cerrar sesión</a>
                    </li>                
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
