<?php $__env->startSection('content'); ?>
    <!-- Botón de "Atrás" -->
    <?php if(isset($isEditing)): ?>
    <div class="text-right">
        <a href="<?php echo e(route('logistica')); ?>" class="btn btn-secondary mb-3">Atrás</a>
    </div>
    <?php endif; ?>

    <div class="container">
        <h2>Reglas de Abastecimiento</h2>
        <link rel="stylesheet" href="<?php echo e(asset('css/supplyrule.css')); ?>">

        <!-- Mostrar mensaje de éxito si existe -->
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <!-- Contenedor para crear nueva regla de abastecimiento -->
        <div class="form-container">
            <h3>Crear Regla de Abastecimiento</h3>
            <form method="POST" action="<?php echo e(route('supply_rules.store')); ?>" class="form-inline">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="min_quantity">Cantidad Mínima</label>
                    <input type="number" id="min_quantity" name="min_quantity" class="form-control" min="0" required>
                </div>

                <div class="form-group">
                    <label for="max_quantity">Cantidad Máxima</label>
                    <input type="number" id="max_quantity" name="max_quantity" class="form-control" min="0" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Crear Regla</button>
                </div>
            </form>
        </div>

        <!-- Contenedor para editar regla de abastecimiento -->
        <div class="form-container">
            <h3>Editar Regla de Abastecimiento</h3>
            <?php if(isset($supplyRule)): ?>
                <form method="POST" action="<?php echo e(route('supply_rules.update', $supplyRule->id)); ?>" id="editForm" class="form-inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?> <!-- Método PUT para actualizar -->
                    <div class="form-group">
                        <label for="product_id">Producto</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>" <?php echo e($supplyRule->product_id == $product->id ? 'selected' : ''); ?>><?php echo e($product->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="min_quantity">Cantidad Mínima</label>
                        <input type="number" id="min_quantity" name="min_quantity" class="form-control" min="0" value="<?php echo e($supplyRule->min_quantity); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="max_quantity">Cantidad Máxima</label>
                        <input type="number" id="max_quantity" name="max_quantity" class="form-control" min="0" value="<?php echo e($supplyRule->max_quantity); ?>" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar Regla</button>
                    </div>
                </form>
            <?php else: ?>
                <p>Seleccione una regla para editar.</p>
            <?php endif; ?>
        </div>

        <!-- Contenedor separado para la tabla -->
        <div class="table-container">
            <h3>Reglas de Abastecimiento Existentes</h3>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad Mínima</th>
                        <th>Cantidad Máxima</th>
                        <th>Acciones</th> <!-- Nueva columna para el botón de actualizar -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $supplyRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($rule->product->name); ?></td>
                            <td><?php echo e($rule->min_quantity); ?></td>
                            <td><?php echo e($rule->max_quantity); ?></td>
                            <td>
                                <a href="<?php echo e(route('supply_rules.edit', $rule->id)); ?>" class="btn btn-warning">Editar</a>
                                <form action="<?php echo e(route('supply_rules.destroy', $rule->id)); ?>" method="POST" style="display:inline-block;">
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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/regla_abastecimiento.blade.php ENDPATH**/ ?>