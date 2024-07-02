<?php $__env->startSection('content'); ?>
    <div class="container">
        <h2>Categoría Productos</h2>
        <link rel="stylesheet" href="<?php echo e(asset('css/category_products.css')); ?>">

        <!-- Botón "Atrás" -->
        <?php if($selected_category_id): ?>
            <a href="<?php echo e(route('logistica')); ?>" class="btn btn-back">Atrás</a>
        <?php endif; ?>

        <!-- Formulario de búsqueda por categoría -->
        <form method="GET" action="<?php echo e(route('categoria_productos.index')); ?>" class="form-inline mb-3" id="formulario">
            <div class="form-group">
                <label for="category_id" class="mr-2">Filtrar por Categoría:</label>
                <select name="category_id" id="category_id" class="form-control mr-2">
                    <option value="">Todas</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php echo e($selected_category_id == $category->id ? 'selected' : ''); ?>>
                            <?php echo e($category->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <?php if($products->isEmpty()): ?>
            <div class="alert alert-info" role="alert">
                No hay productos disponibles.
            </div>
        <?php else: ?>
            <div class="table-responsive">
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
                                <td><?php echo e($product->category->name ?? 'Sin categoría'); ?></td>
                                <td><?php echo e($product->created_at); ?></td>
                                <td><?php echo e($product->updated_at); ?></td>
                                <td>
                                    <!-- Aquí van los enlaces o botones para acciones relacionadas con el producto -->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/categoria_productos.blade.php ENDPATH**/ ?>