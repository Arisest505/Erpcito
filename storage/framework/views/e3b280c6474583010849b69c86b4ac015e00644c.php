<!-- resources/views/backup/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Backups</title>
</head>
<body>
    <h1>Listado de Backups Disponibles</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nombre del Archivo</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $backups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $backup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($backup['name']); ?></td>
                <td><?php echo e($backup['created_at']); ?></td>
                <td>
                    <form action="<?php echo e(route('backup.download.file')); ?>" method="get">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="file_name" value="<?php echo e($backup['name']); ?>">
                        <button type="submit">Descargar</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/backup/index.blade.php ENDPATH**/ ?>