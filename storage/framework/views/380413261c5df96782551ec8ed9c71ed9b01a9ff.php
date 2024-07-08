<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Gestión de Productos</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="row mb-3">
        <div class="col-md-6">
            <a href="<?php echo e(route('productos.create')); ?>" class="btn btn-success">Crear Producto</a>
        </div>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Unidad de Medida</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Almacén</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <td><?php echo e($product->description); ?></td>
                    <td><?php echo e($product->unit_price); ?></td>
                    <td><?php echo e($product->unit_of_measure); ?></td>
                    <td><?php echo e($product->stock); ?></td>
                    <td><?php echo e(optional($product->category)->name); ?></td>
                    <td><?php echo e(optional($product->almacen)->nombre); ?></td>
                    <td>
                        <a href="<?php echo e(route('productos.edit', $product->id)); ?>" class="btn btn-primary">Editar</a>
                        <form method="POST" action="<?php echo e(route('productos.destroy', $product->id)); ?>" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/productos.blade.php ENDPATH**/ ?>