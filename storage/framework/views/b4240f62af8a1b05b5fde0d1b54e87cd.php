<?php $__env->startSection('content'); ?>
    <h1>Modifier la fiche de paie</h1>

    <!-- Formulaire de modification de la fiche de paie -->
    <form action="<?php echo e(route('fiche_de_paie.update', $ficheDePaie->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div>
            <label for="user_id">Utilisateur :</label>
            <select name="user_id" id="user_id">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php if($user->id === $ficheDePaie->user_id): ?> selected <?php endif; ?>><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div>
            <label for="month">Mois :</label>
            <input type="date" name="month" id="month" value="<?php echo e($ficheDePaie->month); ?>">
        </div>
        <div>
            <label for="salaire_total">Salaire total :</label>
            <input type="text" name="salaire_total" id="salaire_total" value="<?php echo e($ficheDePaie->salaire_total); ?>">
        </div>
        <div>
            <label for="salairefinal">Salaire final :</label>
            <input type="text" name="salairefinal" id="salairefinal" value="<?php echo e($ficheDePaie->salairefinal); ?>">
        </div>
        <button type="submit">Modifier</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/fiche_de_paie/edit.blade.php ENDPATH**/ ?>