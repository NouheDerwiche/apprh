<!-- resources/views/taches/create.blade.php -->



<?php $__env->startSection('content'); ?>


<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
<div class=" container-xxl ">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <h1> Ajouter tache</h1>
    </div>
    <div class="pull-right mb-3">
        <a class="btn btn-light-primary" href="<?php echo e(route('tache.index')); ?>"> Annuler</a>
    </div>
<!--begin::Card-->

<!--begin::Search-->


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">

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
                            <option value=""><strong>Sélectionner un projet</strong></option>
                            <?php $__currentLoopData = $projets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($projet->id); ?>"><?php echo e($projet->titre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                        <div class="form-group mb-3">
                            <label for="nom"><strong>Nom :</strong></label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description :</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="localisation">Localisation :</label>
                            <input type="text" name="localisation" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="debut">Date de début :</label>
                            <input type="date" name="debut" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fin">Date de fin :</label>
                            <input type="date" name="fin" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
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




</div>
</div>
</div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/tache/create.blade.php ENDPATH**/ ?>