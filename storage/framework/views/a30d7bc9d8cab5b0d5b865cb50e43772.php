<?php $__env->startSection('content'); ?>





<div class=" container-xxl ">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1> Modifier Role</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-light-primary" href="<?php echo e(route('roles.index')); ?>"> Annuler</a>
            </div>
        </div>
    </div>


<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
<div class=" container-xxl ">

<!--begin::Card-->
<div class="card card-flush ">
<!--begin::Card header-->
<div class="card-header mt-6">
<!--begin::Card title-->
<div class="card-title">
<!--begin::Search-->



<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        Oups !</strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php echo Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]); ?>

<div class="rfv-row mb-10">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Nom:</strong>
            <?php echo Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control form-control-solid']); ?>

        </div>
    </div>
    <div class="fv-row">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Autorisations:</strong>
            <br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($value->name); ?></td>
                            <td>
                                <label>
                                    <?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name'])); ?>

                                    Cocher
                                </label>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/roles/edit.blade.php ENDPATH**/ ?>