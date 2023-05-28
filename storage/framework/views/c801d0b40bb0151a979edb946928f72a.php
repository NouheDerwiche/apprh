<?php $__env->startSection('content'); ?>
<div class="container-xxl">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Ajouter un rôle</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-light-primary" href="<?php echo e(route('roles.index')); ?>">Annuler</a>
            </div>
        </div>
    </div>

    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            <div class="card card-flush">
                <div class="card-header mt-6">
                    <div class="card-title">
                        <div class="fv-row mb-10">
                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <strong>Oups !</strong> Il y a eu des problèmes avec votre entrée.<br><br>
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>


                            <?php echo Form::open(array('route' => 'roles.store','method'=>'POST')); ?>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="fs-5 fw-bold form-label mb-2">
                                        <strong>Nom de Role:</strong>
                                        <?php echo Form::text('name', null, array('placeholder' => 'Nom','class' => 'form-control form-control-solid')); ?>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="fs-5 fw-bold form-label mb-2">
                                        <strong>Autorisation:</strong>
                                        <br/>
                                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label><?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                            <?php echo e($value->name); ?></label>
                                        <br/>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/roles/create.blade.php ENDPATH**/ ?>