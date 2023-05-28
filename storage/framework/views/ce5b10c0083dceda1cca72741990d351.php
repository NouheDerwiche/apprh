<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card">
        <div class="card-header"><?php echo e(__('Détails du congé')); ?></div>

        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td><?php echo e(__('Utilisateur')); ?></td>
                        <td><?php echo e($conge->user->name); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Date de début')); ?></td>
                        <td><?php echo e($conge->date_debut); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Date de fin')); ?></td>
                        <td><?php echo e($conge->date_fin); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Type de congé')); ?></td>
                        <td><?php echo e($conge->type_conge); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Statut')); ?></td>
                        <td><?php echo e($conge->status); ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <a href="<?php echo e(route('conges.index')); ?>" class="btn btn-secondary"><?php echo e(__('Retour à la liste des congés')); ?></a>
                <?php if(auth()->user()->hasRole('admin')): ?>
                <a href="<?php echo e(route('conges.edit', $conge->id)); ?>" class="btn btn-primary"><?php echo e(__('Modifier le congé')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/conges/show.blade.php ENDPATH**/ ?>