<?php $__env->startSection('content'); ?>


<h1>Créer une fiche de paie</h1>

<!-- Formulaire de création de la fiche de paie -->
<form action="<?php echo e(route('fiche_de_paie.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
        <label for="user_id">Utilisateur :</label>
        <select name="user_id" id="user_id">
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div>
        <label for="month">Mois :</label>
        <input type="date" name="month" id="month">
    </div>
    <div>
        <label for="salaire_total">Salaire total :</label>
        <input type="text" name="salaire_total" id="salaire_total">
    </div>
    <div>
        <label for="salairefinal">Salaire final :</label>
        <input type="text" name="salairefinal" id="salairefinal">
    </div>
    <button type="submit">Créer</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/fiche_de_paie/create.blade.php ENDPATH**/ ?>