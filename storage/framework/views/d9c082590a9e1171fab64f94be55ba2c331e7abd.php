<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Almacenes</h2>
                <link rel="stylesheet" href="<?php echo e(asset('css/almacen.css')); ?>">

                <!-- Mostrar mensaje de éxito si existe -->
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <!-- Contenedor para los formularios -->
                <div class="row">
                    <!-- Formulario para crear nuevo almacén -->
                    <div class="col-md-6">
                        <div id="formulario">
                            <h3>Crear Almacén</h3>
                            <form method="POST" action="<?php echo e(route('almacens.store')); ?>">
                                <?php echo csrf_field(); ?>

                                
                                <div class="form-group">
                                    <label for="nombre">Nombre del Almacén</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" required>
                                </div>

                                
                                <div class="form-group">
                                    <label for="ubicacion">Ubicación del Almacén</label>
                                    <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
                                </div>

                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Crear Almacén</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Formulario para editar almacén -->
                    <div class="col-md-6">
                        <div id="formulario">
                            <h3>Editar Almacén</h3>
                            <?php if(isset($almacen)): ?>
                                <form method="POST" action="<?php echo e(route('almacens.update', $almacen->id)); ?>" id="editForm">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?> <!-- Método PUT para actualizar -->

                                    
                                    <div class="form-group">
                                        <label for="edit-nombre">Nombre del Almacén</label>
                                        <input type="text" id="edit-nombre" name="nombre" class="form-control" value="<?php echo e($almacen->nombre); ?>" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="edit-ubicacion">Ubicación del Almacén</label>
                                        <input type="text" id="edit-ubicacion" name="ubicacion" class="form-control" value="<?php echo e($almacen->ubicacion); ?>" required>
                                    </div>

                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Actualizar Almacén</button>
                                    </div>
                                </form>
                            <?php else: ?>
                                <p>Seleccione un almacén para editar.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Tabla de almacenes -->
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                            <th>Acciones</th> <!-- Nueva columna para el botón de actualizar -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $almacenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $almacen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($almacen->id); ?></td>
                                <td><?php echo e($almacen->nombre); ?></td>
                                <td><?php echo e($almacen->ubicacion); ?></td>
                                <td><?php echo e($almacen->created_at); ?></td>
                                <td><?php echo e($almacen->updated_at); ?></td>
                                <td>
                                    <a href="<?php echo e(route('almacens.edit', $almacen->id)); ?>" class="btn btn-primary">Actualizar</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\app\resources\views/almacenes.blade.php ENDPATH**/ ?>