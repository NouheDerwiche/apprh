<!-- resources/views/taches/create.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h1> Créer une nouvelle tâche</h1>

                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('tache.store')); ?>">
                            <?php echo csrf_field(); ?>
                        <div>
                            <select name="projet_id" id="projet_id" class="form-control">
                                <option value="">Sélectionner un projet</option>
                                <?php $__currentLoopData = $projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($projet->id); ?>"><?php echo e($projet->titre); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="localisation">Localisation :</label>
                                <input type="text" name="localisation" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="debut">Date de début :</label>
                                <input type="date" name="debut" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fin">Date de fin :</label>
                                <input type="date" name="fin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nb_heures">Nombre d'heures :</label>
                                <input type="number" name="nb_heures" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/tache/create.blade.php ENDPATH**/ ?>