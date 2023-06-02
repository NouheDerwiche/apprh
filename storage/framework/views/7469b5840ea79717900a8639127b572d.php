<!-- resources/views/conges/index.blade.php -->



<?php $__env->startSection('content'); ?>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <h1> Listes des demandes</h1>
    </div>
    <!--begin::Post-->

    <!--begin::Container-->


    <!--begin::Card-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class=" container-xxl ">
            <!--begin::Card header-->
            <div class="card-header mt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
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
                                                                <span
                                                                    class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">12</span>
                                                                <!--end::Amount-->

                                                                <!--begin::Badge-->
                                                                <span class="badge badge-primary text-white fs-base">
                                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

                                                                    <!--end::Svg Icon-->
                                                                    Jours
                                                                </span>
                                                                <!--end::Badge-->
                                                            </div>
                                                            <!--end::Info-->

                                                            <!--begin::Subtitle-->
                                                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges
                                                                Total Par
                                                                Ans</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Header-->


                                                </div>
                                                <!--end::Card widget 5-->
                                        </div>
                                        <!--end::Col-->
                                        </th>
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
                                                            <span
                                                                class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,5</span>
                                                            <!--end::Amount-->

                                                            <!--begin::Badge-->
                                                            <span class="badge badge-primary fs-base">
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

                                                                <!--end::Svg Icon-->
                                                                Jours
                                                            </span>
                                                            <!--end::Badge-->
                                                        </div>
                                                        <!--end::Info-->

                                                        <!--begin::Subtitle-->
                                                        <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges
                                                            Total Par
                                                            Mois</span>
                                                        <!--end::Subtitle-->
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Header-->


                                            </div>
                                            <!--end::Card widget 5-->
                                    </div>
                                    <!--end::Col-->
                                    </th>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid btn-sm " id="kt_post">
        <!--begin::Container-->
        <div class=" container-xxl ">
            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2" for="statut">Rechercher par status :</span>
            <form action="<?php echo e(route('conges.index')); ?>" method="GET" class="d-flex">

                <div class="d-flex align-items-center btn-sm  position-relative my-1 me-5 mb-3">

                    <select name="statut" id="statut" class="form-control btn-sm  form-control-solid w-250px ps-15">
                        <option value="">Tous</option>
                        <option value="en attente" <?php echo e(request('statut') == 'en attente' ? 'selected' : ''); ?>>En attente</option>
                        <option value="accepte" <?php echo e(request('statut') == 'accepte' ? 'selected' : ''); ?>>Accepté</option>
                        <option value="refuse" <?php echo e(request('statut') == 'refuse' ? 'selected' : ''); ?>>Refusé</option>
                    </select>
                </div>

                <div class="form-group btn-sm  mb-3">
                    <button type="submit" class="btn btn-sm mb-3 btn-primary">Rechercher</button>
                    <a href="<?php echo e(route('conges.index')); ?>" class="btn btn-sm mb-3 btn-secondary">Réinitialiser</a>
                </div>
            </form>



            <!--begin::Card-->
            <div class="card card-flush ">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->

                        <div class="d-flex align-items-center position-relative my-1 me-5">

                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6"><svg width="24" height="24"
                                    viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>

                            <form action="<?php echo e(route('conges.index')); ?>" method="GET" role="search">
                                <!--end::Svg Icon--> <input type="text"
                                    class="form-control form-control-solid w-250px ps-15" name="name" id="name"
                                    value="<?php echo e(request('name')); ?>" placeholder="chercher par nom">
                            </form>

                        </div>
                        <!--end::Search-->
                    </div>



                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>


                    <!--end::Card widget 8-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>User name</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Type congé</th>
                                <th>status</th>
                                <th>Nombre de jour</th>
                                <th>Solde</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $conges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $origin = new DateTime($conge->date_debut);
                                    $target = new DateTime($conge->date_fin);
                                    $interval = $origin->diff($target);
                                    $duree = $interval->format('%a');

                                ?>
                                <tr>
                                    <td><?php echo e($conge->id); ?></td>
                                    <td><?php echo e($conge->user->name); ?></td>

                                    <td><?php echo e($conge->date_debut); ?></td>
                                    <td><?php echo e($conge->date_fin); ?></td>
                                    <td><?php echo e($conge->type_conge); ?></td>
                                    <td>
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


                                    <td><?php echo e($conge->user->solde); ?>

                                    </td>



                                    <td class="d-flex align-itms-center">
                                        <?php if($conge->status == 'en attente'): ?>
                                            <!-- Formulaire pour accepter le congé -->
                                            <form
                                                action="<?php echo e(route('conges.congestate', ['status' => 'accepte', 'congeId' => $conge->id])); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit"
                                                    class="btn btn-sm   btn-success ml-2">Accepter</button>
                                            </form>

                                            <!-- Formulaire pour refuser le congé -->
                                            <form
                                                action="<?php echo e(route('conges.congestate', ['status' => 'refuse', 'congeId' => $conge->id])); ?>"
                                                method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="btn btn-sm  btn-danger">Refuser</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>





                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>

                    <!--
                    <script>
                        function f(event, y) {

                            var x = event.target.value
                            if (x == 'accepte') {
                                location.href = '/conges/accepte/' + y
                            }
                            if (x == 'refuse') {
                                location.href = '/conges/refuse/' + y
                            }
                            if (x == 'en attente') {
                                location.href = '/conge/en attente/' + y
                            }


                        }
                    </script>
                    -->

                    <style>
                        .bg-secondary {
                            background-color: #454b51;
                            /* gris */
                            color: #fff;
                            width: 100px;
                            height: 50px;
                        }

                        .bg-success {
                            background-color: #28a745;
                            /* vert */
                            color: #fff;
                            width: 100px;
                            height: 50px;
                        }

                        .bg-danger {
                            background-color: #dc3545;
                            /* rouge */
                            color: #fff;
                            width: 10px;
                            height: 5px;
                        }
                    </style>

                </div>


            </div>


        </div>




    </div>


    <?php echo e($conges->links('pagination::bootstrap-4')); ?>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            padding: 6px 12px;
            margin: 0 2px;
            border: 1px solid #ccc;
            background-color: #fff;
            color: #333;
            text-decoration: none;
        }

        .pagination .page-link:hover {
            background-color: #e0e0e0;
        }

        .pagination .page-item.active .page-link {
            background-color: #3a95f7;
            color: #fff;
            border-color: #007bff;
        }
    </style>
    </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/conges/index.blade.php ENDPATH**/ ?>