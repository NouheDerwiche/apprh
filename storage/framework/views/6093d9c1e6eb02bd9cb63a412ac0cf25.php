<?php $__env->startSection('content'); ?>
<div class="container-xxl">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Votre rôle</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-light-primary" href="<?php echo e(route('roles.index')); ?>">Annuler</a>
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


<table class="table table-striped">
    <tbody>
        <tr>
           <td><strong> Role</strong></td>
           <td class="text-blue role-name"><span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2 text-primary"><?php echo e($role->name); ?></span></td>
           <style>
    .role-name.text-blue {
        color: blue;
    }
            </style>

        </tr>
        <tr>
            <td><strong>Autorisation:</strong></td>
            <td>

                <?php if(!empty($rolePermissions)): ?>
                    <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="fa fa-check-circle"></span> <?php echo e($v->name); ?><br>                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/roles/show.blade.php ENDPATH**/ ?>