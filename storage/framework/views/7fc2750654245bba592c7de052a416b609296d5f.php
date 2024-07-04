<?php $__env->startSection('content'); ?>
    <!-- Botón de "Atrás" -->
    <?php if($searchPerformed): ?>
    <div class="text-right">
        <a href="<?php echo e(route('logistica')); ?>" class="btn btn-secondary mb-3">Atrás</a>
    </div>
    <?php endif; ?>

    <div class="container">
        <h1>Stock de Productos</h1>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="<?php echo e(route('stock')); ?>" class="form-inline mb-4">
            <div class="form-group mr-3">
                <select name="almacen" class="form-control">
                    <option value="">Buscar por almacén</option>
                    <?php $__currentLoopData = $almacenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $almacen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($almacen->id); ?>" <?php echo e($selected_almacen == $almacen->id ? 'selected' : ''); ?>>
                            <?php echo e($almacen->nombre); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group mr-3">
              <select name="categoria" class="form-control">
                    <option value="">Buscar por categoría</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->name); ?>" <?php echo e($selected_categoria == $category->name ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group mr-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto" value="<?php echo e(request()->input('nombre')); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php if($searchPerformed && $products->isEmpty()): ?>
            <div class="alert alert-info" role="alert">
                No hay productos disponibles con los criterios de búsqueda.
            </div>
        <?php elseif($products->isEmpty()): ?>
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
                            <th>Almacén</th>
                            <th>Categoría</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
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
                                <td><?php echo e($product->almacen->nombre ?? 'Sin almacén'); ?></td>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/stock.blade.php ENDPATH**/ ?>