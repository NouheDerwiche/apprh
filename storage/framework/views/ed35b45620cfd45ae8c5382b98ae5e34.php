<?php $__env->startSection('content'); ?>
    <!--begin::Post-->
    <div class="container-xxl">
        <div class="fv-row mb-10">
            <div class="col-lg-12 margin-tb">

                <div class="pull-right">
                    <a class="btn btn-light-primary" href="<?php echo e(route('users.index')); ?>">Annuler</a>
                </div>
            </div>
        </div>

        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container-xxl">
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="fv-row mb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <h1>Informations</h1>
                                </div>
                                <style>
                                    .form-group strong {
                                        display: inline-block;
                                        width: 150px;
                                        font-weight: bold;
                                        margin-right: 10px;
                                    }
                                    .form-group label {
                                        background-color: #51c76e;
                                        display: inline-block;
                                        margin-right: 5px;
                                        margin-bottom: 5px;
                                    }
                                    .form-group .badge {
                                        margin-right: 5px;
                                        font-size: 0.8em;
                                    }
                                    .col-xs-12 {
                                        margin-bottom: 20px;
                                    }
                                    .mb-10 {
                                        margin-bottom: 10px;
                                    }
                                    .form-group {
                                        margin-bottom: 10px;
                                    }
                                    .badge-success {
                                        background-color: #28a745;
                                    }
                                    /* Ajouter d'autres styles CSS ici si nécessaire */
                                </style>
                                <table class="table table-bordered justify-content-center align-items-center" style="width: 900px; height: 300px; margin: 4%">
                                    <tbody>
                                        <tr>
                                            <th>Nom:</th>
                                            <td><?php echo e($user->name); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Prenom:</th>
                                            <td><?php echo e($user->prenom); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date de Naissance:</th>
                                            <td><?php echo e($user->date_naiss); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Cin:</th>
                                            <td><?php echo e($user->cin); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td><?php echo e($user->address); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Matricule:</th>
                                            <td><?php echo e($user->num_emp); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ville:</th>
                                            <td><?php echo e($user->ville); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Code Postal:</th>
                                            <td><?php echo e($user->codepostal); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Téléphone:</th>
                                            <td><?php echo e($user->phone); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Solde:</th>
                                            <td><?php echo e($user->solde); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Salaire:</th>
                                            <td><?php echo e($user->salaire); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td><?php echo e($user->email); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Roles:</th>
                                            <td>
                                                <?php if(!empty($user->getRoleNames())): ?>
                                                    <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <label class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2 text-primary"><?php echo e($v); ?></label>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/users/show.blade.php ENDPATH**/ ?>