<?php $__env->startSection('content'); ?>
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Modifier projet</h1>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-light-primary" href="<?php echo e(route('projets.index')); ?>"> Annuler</a>
            </div>
            <!--begin::Card-->
            <div class="card card-flush mt-6">
                <!--begin::Card header-->
                <div class="card-header d-flex justify-content-center">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <form action="<?php echo e(route('projets.update', $projet->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Titre:</strong>
                                        <input type="text" name="titre" value="<?php echo e($projet->titre); ?>" class="form-control mb-3" placeholder="Titre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Date début :</strong>
                                        <input type="date" name="debut" value="<?php echo e($projet->debut); ?>" class="form-control mb-3" placeholder="Date début">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Date fin :</strong>
                                        <input type="date" name="fin" value="<?php echo e($projet->fin); ?>" class="form-control" placeholder="Date fin">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Description :</strong>
                                        <textarea name="description" class="form-control mb-3" placeholder="Description"><?php echo e($projet->description); ?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/projets/edit.blade.php ENDPATH**/ ?>