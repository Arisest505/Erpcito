<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Horizontal</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
</head>
<body>
    <nav class="navbar">
        <!-- Usuario y Logout -->
        <div class="navbar-user">
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                <?php endif; ?>
            <?php else: ?>
                <div class="dropdown">
                    <a href="#" class="dropbtn"><?php echo e(Auth::user()->name); ?> ▼</a>
                    <div class="dropdown-content">
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Links al centro -->
        <div class="navbar-menu">
            <a href="<?php echo e(route('logistica')); ?>">Logística</a>
            <a href="<?php echo e(route('contabilidad')); ?>">Contabilidad</a>
            <a href="<?php echo e(route('finanzas')); ?>">Finanzas</a>
            <a href="<?php echo e(route('linea_avicola')); ?>">Línea Avícola</a>
            <a href="<?php echo e(route('gestor_produccion')); ?>">Gestor de Producción</a>
        </div>
        <!-- Boton del BackUp -->
        <div class="backup-btn">
            <a href="<?php echo e(route('backup.download')); ?>" class="btn btn-primary">Descargar Backup</a>
        </div>




        <!-- Logo a la derecha -->
        <a href="#">
            <img src="<?php echo e(asset('img/Image_fox_white.png')); ?>" alt="Logo" class="navbar-logo">

        </a>
    </nav>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>