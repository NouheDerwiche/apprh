<?php $__env->startSection('content'); ?>
<div class="container">
<h1 class="display-4">Détails du jour férié</h1>
<div class="card my-1">
<div class="card-header">
<h5 class="card-title mb-0"><strong>Nom :</strong> <?php echo e($holiday->name); ?></h5>
</div>
<div class="card-body">
<p class="card-text"><strong>Date debut :</strong> <?php echo e($holiday->date); ?></p>
</div>
<div class="card-body">
    <p class="card-text"><strong>Date Fin :</strong> <?php echo e($holiday->date2); ?></p>
    </div>
</div>
<a href="<?php echo e(route('holidays.index')); ?>" class="btn btn-primary">Retour</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/holidays/show.blade.php ENDPATH**/ ?>