<?php $__env->startSection('content'); ?>
    <h1>Détails de la fiche de paie</h1>

    <p><strong>ID :</strong> <?php echo e($ficheDePaie->id); ?></p>
    <p><strong>Utilisateur :</strong> <?php echo e($ficheDePaie->user->name); ?></p>
    <p><strong>Mois :</strong> <?php echo e($ficheDePaie->month); ?></p>
    <p><strong>Salaire total :</strong> <?php echo e($ficheDePaie->salaire_total); ?></p>
    <p><strong>Salaire final :</strong> <?php echo e($ficheDePaie->salairefinal); ?></p>

    <a href="<?php echo e(route('fiche_de_paie.index')); ?>">Retour à la liste des fiches de paie</a>

    <a href="<?php echo e(route('fiche_de_paie.imprimer', $ficheDePaie->id)); ?>" target="_blank">Imprimer la fiche de paie</a>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/fiche_de_paie/show.blade.php ENDPATH**/ ?>