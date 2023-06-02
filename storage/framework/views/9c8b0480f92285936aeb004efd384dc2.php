<?php $__env->startSection('content'); ?>
<h1>Liste des fiches de paie</h1>

<a href="<?php echo e(route('fiche_de_paie.create')); ?>">Créer une nouvelle fiche de paie</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Utilisateur</th>
            <th>Mois</th>
            <th>Salaire total</th>
            <th>Salaire final</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $fichesDePaie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ficheDePaie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($ficheDePaie->id); ?></td>
                <td><?php echo e($ficheDePaie->user->name); ?></td>
                <td><?php echo e($ficheDePaie->month); ?></td>
                <td><?php echo e($ficheDePaie->salaire_total); ?></td>
                <td><?php echo e($ficheDePaie->salairefinal); ?></td>
                <td>
                    <a href="<?php echo e(route('fiche_de_paie.show', $ficheDePaie->id)); ?>">Afficher</a>
                    <a href="<?php echo e(route('fiche_de_paie.edit', $ficheDePaie->id)); ?>">Modifier</a>
                    <a href="<?php echo e(route('fiche_de_paie.imprimer', $ficheDePaie->id)); ?>">Imprimer</a>
                    <form action="<?php echo e(route('fiche_de_paie.destroy', $ficheDePaie->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/fiche_de_paie/index.blade.php ENDPATH**/ ?>