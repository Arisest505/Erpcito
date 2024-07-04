<?php $__env->startSection('content'); ?>
    <!-- Botón de "Atrás" -->
    <?php if($searchPerformed): ?>
    <div class="text-right">
        <a href="<?php echo e(route('logistica')); ?>" class="btn btn-secondary mb-3">Atrás</a>
    </div>
    <?php endif; ?>
    <div class="container">
        <h2>Unidad de Medida de Productos</h2>
        <link rel="stylesheet" href="<?php echo e(asset('css/unitofmeasure.css')); ?>">

        <!-- Formulario de búsqueda -->
        <form method="GET" action="<?php echo e(route('unidad_medida')); ?>" class="form-inline mb-4">
            <div class="form-group mr-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto" value="<?php echo e(request()->input('nombre')); ?>">
            </div>
            <div class="form-group mr-3">
                <select name="category_id" class="form-control">
                    <option value="">Seleccione Categoría</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($selected_category_id == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group mr-3">
                <select name="unidad" class="form-control">
                    <option value="">Seleccione Unidad de Medida</option>
                    <?php $__currentLoopData = $unidades_medida; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unidad_medida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($unidad_medida->unit_of_measure); ?>" <?php echo e($unidad == $unidad_medida->unit_of_measure ? 'selected' : ''); ?>>
                            <?php echo e($unidad_medida->unit_of_measure); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php if($products->isEmpty()): ?>
            <div class="alert alert-info" role="alert">
                No hay productos disponibles.
            </div>
        <?php else: ?>
            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio Unitario</th>
                            <th>Unidad de Medida</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
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
                                <td><?php echo e($product->category->name ?? 'Sin categoría'); ?></td>
                                <td><?php echo e($product->created_at); ?></td>
                                <td><?php echo e($product->updated_at); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/unidad_medida.blade.php ENDPATH**/ ?>