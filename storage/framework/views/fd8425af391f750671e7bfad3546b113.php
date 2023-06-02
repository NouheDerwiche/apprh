<?php $__env->startSection('content'); ?>

<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->

    <!--begin::Card-->
    <div class="card card-flush ">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <div>
                    <div class="card-header">
                        <h2>Ajouter un nouveau projet</h2>
                    </div>
                    <div class="">
                        <a class="btn btn-primary" href="<?php echo e(route('projets.index')); ?>">Retour</a>
                        <br><br>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <strong>Oups !</strong> Il y a eu quelques problèmes avec votre saisie.<br><br>
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('projets.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label for="titre">Titre :</label>
                                <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre du projet">
                            </div>

                            <div class="form-group">
                                <label for="debut">Date de début :</label>
                                <input type="date" name="debut" class="form-control" id="debut" placeholder="Date de début du projet">
                                <?php $__errorArgs = ['debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="fin">Date de fin :</label>
                                <input type="date" name="fin" class="form-control" id="fin" placeholder="Date de fin du projet">
                                <?php $__errorArgs = ['fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/projets/create.blade.php ENDPATH**/ ?>