<!-- resources/views/conges/index.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Liste des Congés </h1>
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
<table>
    <thead>
        <tr>
             <!--begin::Col-->
    <div class="col-xxl-6 mb-md-5 mb-xl-10">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
                <th>
                    <!--begin::Card widget 5-->
    <div class="card card-flush h-md-50 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">12</span>
                    <!--end::Amount-->

                    <!--begin::Badge-->
                    <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

    <!--end::Svg Icon-->
                      Jours
                    </span>
                    <!--end::Badge-->
                </div>
                <!--end::Info-->

                <!--begin::Subtitle-->
                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Total Par Ans</span>
                <!--end::Subtitle-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->


    </div>
    <!--end::Card widget 5-->            </div>
                <!--end::Col--></th><th>
                <!--begin::Card widget 5-->
<div class="card card-flush h-md-50 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,5</span>
                <!--end::Amount-->

                <!--begin::Badge-->
                <span class="badge badge-light-success fs-base">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

<!--end::Svg Icon-->
                  Jours
                </span>
                <!--end::Badge-->
            </div>
            <!--end::Info-->

            <!--begin::Subtitle-->
            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Total Par Mois</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->


</div>
<!--end::Card widget 5-->            </div>
            <!--end::Col--></th>
            <th>
                <!--begin::Card widget 5-->
<div class="card card-flush h-md-50 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <?php if(auth()->guard()->check()): ?>
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2"><?php echo e(Auth::user()->solde); ?>


                  </span>
                <!--end::Amount-->
<?php endif; ?>
                <!--begin::Badge-->
                <span class="badge badge-light-danger fs-base">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

<!--end::Svg Icon-->
                  Jours
                </span>
                <!--end::Badge-->
            </div>
            <!--end::Info-->

            <!--begin::Subtitle-->
            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Restant Par Ans</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->


</div>
<!--end::Card widget 5-->            </div>
            <!--end::Col--></th>

                <th>
                    <!--begin::Card widget 5-->
    <div class="card card-flush h-md-50 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <?php if(auth()->guard()->check()): ?>
                        <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">Solde : <?php echo e(auth()->user()->solde); ?></span>
                    <?php endif; ?>

                    <!--begin::Badge-->
                    <span class="badge badge-light-danger fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

    <!--end::Svg Icon-->
                      Jours
                    </span>
                    <!--end::Badge-->
                </div>
                <!--end::Info-->

                <!--begin::Subtitle-->
                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Restant Par Mois</span>
                <!--end::Subtitle-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->


    </div>
    <!--end::Card widget 5-->            </div>
                <!--end::Col--></th>
        </tr>
    </thead>

    </div><br/>

</table >

        <table class="table">
            <div class="card-toolbar">

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                <!--begin::Add user-->

                <a class="btn btn-primary" href="<?php echo e(route('conges.create')); ?>">  Ajouter un congé</a>
               </div>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>User ID</th>
                    <th>User name</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Type congé</th>
                    <th>status</th>
                    <th>NBjr</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $conges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($conge->id); ?></td>
                        <td><?php echo e($conge->user_id); ?></td>
                        <td><?php echo e($conge->user->name); ?></td>
                        <td><?php echo e($conge->date_debut); ?></td>
                        <td><?php echo e($conge->date_fin); ?></td>
                        <td><?php echo e($conge->type_conge); ?></td>
                        <td >
                            <?php if($conge->status == 'en attente'): ?>
                                <span class="badge badge-light-warning fs-base">
                                    <i class="fas fa-clock"></i> <?php echo e(__('En attente')); ?>

                                </span>
                            <?php elseif($conge->status == 'accepte'): ?>
                                <span class="badge badge-light-success fs-base">
                                    <i class="fas fa-check"></i> <?php echo e(__('Accepté')); ?>

                                </span>
                            <?php elseif($conge->status == 'refuse'): ?>
                                <span class="badge badge-light-danger fs-base">
                                    <i class="fas fa-times"></i> <?php echo e(__('Refusé')); ?>

                                </span>
                            <?php endif; ?>
                        </td>

                        <td><?php echo e($conge->duree); ?> jours</td>

                        
                        <td>
                            <a href="<?php echo e(route('conges.edit', $conge->id)); ?>" class="btn btn-primary">Modifier</a>
                            <form action="<?php echo e(route('conges.destroy', $conge->id)); ?>" method="POST" style="display:inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                <a href="<?php echo e(route('conges.show', ['conge' => $conge->id])); ?>" class="btn btn-secondary"><?php echo e(__('show')); ?></a>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>



<style>
    .bg-secondary {
    background-color: #454b51; /* gris */
    color: #fff;
    width: 100px; height: 50px;
}

.bg-success {
    background-color: #28a745; /* vert */
    color: #fff;
    width: 100px; height: 50px;
}

.bg-danger {
    background-color: #dc3545; /* rouge */
    color: #fff;
    width: 10px; height: 5px;
}

    </style>



    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/conges/user.blade.php ENDPATH**/ ?>