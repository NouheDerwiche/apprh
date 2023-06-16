<?php $__env->startSection('content'); ?>
<!-- resources/views/fiche_de_paie/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche de paie</title>
    <style>
        /* Styles pour la mise en page du PDF */
        /* ... */
    </style>
</head>
<body>
    <h1>Fiche de paie</h1>

    <p><strong>ID :</strong> <?php echo e($ficheDePaie->id); ?></p>
    <p><strong>Utilisateur :</strong> <?php echo e($ficheDePaie->user->name); ?></p>
    <p><strong>Mois :</strong> <?php echo e($ficheDePaie->month); ?></p>
    <p><strong>Salaire total :</strong> <?php echo e($ficheDePaie->salaire_total); ?></p>
    <p><strong>Salaire final :</strong> <?php echo e($ficheDePaie->salairefinal); ?></p>
</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/fiche_de_paie/pdf.blade.php ENDPATH**/ ?>