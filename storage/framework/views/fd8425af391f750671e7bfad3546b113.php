<?php $__env->startSection('content'); ?>
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class=" container-xxl ">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1> Ajouter projet</h1>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-light-primary" href="<?php echo e(route('projets.index')); ?>"> Annuler</a>
            </div>
            <!--begin::Card-->
            <!--begin::Card-->
            <div class="card card-flush mt-6">
                <!--begin::Card header-->
                <div class="card-header d-flex justify-content-center">
                    <!--begin::Card title-->
                    <div class="card-title">



                        <form action="<?php echo e(route('projets.store')); ?>" method="POST" class="mb-4">

                            <?php echo csrf_field(); ?>
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="titre">Titre :</label>
                                        <input type="text" name="titre" width="280px" class="form-control"
                                            id="titre" placeholder="Titre du projet">
                                        <?php $__errorArgs = ['titre'];
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="debut">Date de début :</label>
                                        <input type="date" name="debut" width="280px" class="form-control"
                                            id="debut" placeholder="Date de début du projet">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="fin">Date de fin :</label>
                                        <input type="date" name="fin" width="280px" class="form-control"
                                            id="fin" placeholder="Date de fin du projet">
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
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">

                                        <div class="card">
                                            <label for="description">Description</label>

                                            <input type="description" name="description" width="280px" class="form-control"
                                                id="description" placeholder="description">
                                            <?php $__errorArgs = ['description'];
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
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
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