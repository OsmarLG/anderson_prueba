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
                    <a class="nav-link text-white" href="<?php echo controller::$rutaAPP?>index.php?action=home">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(basename($_SERVER['PHP_SELF']) != '#'): ?>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo controller::$rutaAPP?>index.php?action=logout">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                            </svg>
                        </a>
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
