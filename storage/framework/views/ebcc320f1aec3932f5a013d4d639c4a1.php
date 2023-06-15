<?php $__env->startSection('content'); ?>


    <!--begin::Card-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class=" container-xxl ">

            <!--begin::Card header-->
            <div class="card-header mt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <h1> Les demandes de  <?php echo e(auth()->user()->name); ?>  <?php echo e(auth()->user()->prenom); ?></h1>
                    </div>
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
                                                            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">solde
                                                                Par
                                                                Ans</span>
                                                            <!--end::Subtitle-->
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Header-->


                                                </div>

                                            </th>
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
                                                        <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">
                                                         Solde Par
                                                            Mois</span>
                                                        <!--end::Subtitle-->
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Header-->


                                            </div>
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
                                                            <?php if(auth()->guard()->check()): ?>
                                                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                                                                    <?php echo e(auth()->user()->solde); ?></span>
                                                            <?php endif; ?>
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
                                                        <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Solde
                                                            Actuelle </span>
                                                        <!--end::Subtitle-->
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Header-->


                                            </div>
                                        </th>
                                        <!--end::Card widget 5-->
                                    </div>
                                    <!--end::Col-->
                                </div>

                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>



    <!--begin::Container-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <div class=" container-xxl ">

            <!--begin::Card-->


                <!--begin::Container-->
                <div class=" container-xxl ">
                    <span class="fs-6 fw-bolder text-gray-800 d-block mb-2" for="statut">Rechercher par statuts</span>
                    <form action="<?php echo e(route('conges.user')); ?>" method="GET" class="d-flex">

                        <div class="d-flex align-items-center btn-sm  position-relative my-1 me-5 mb-3">

                            <select name="status" id="status" class="form-control btn-sm  form-control-solid w-250px ps-15">
                                <option value="">Tous</option>
                                <option value="en attente" <?php echo e(request('status') == 'en attente' ? 'selected' : ''); ?>>En attente</option>
                                <option value="accepte" <?php echo e(request('status') == 'accepte' ? 'selected' : ''); ?>>Accepté</option>
                                <option value="refuse" <?php echo e(request('status') == 'refuse' ? 'selected' : ''); ?>>Refusé</option>
                            </select>
                        </div>

                        <div class="form-group btn-sm  mb-3">
                            <button type="submit" class="btn btn-sm mb-3 btn-primary">Rechercher</button>
                            <a href="<?php echo e(route('conges.user')); ?>" class="btn btn-sm mb-3 btn-secondary">Réinitialiser</a>
                        </div>
                    </form>
                </div>

            <div class="card card-flush ">
                <!--begin::Card header-->
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->


                        <!--end::Search-->
                    </div>

                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="<?php echo e(route('conges.create')); ?>" class="btn btn-light-primary">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                            <span class="svg-icon svg-icon-3"><svg width="24" height="24" viewbox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                        rx="5" fill="currentColor"></rect>
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                        transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                        fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon--> Ajouter
                        </a>
                        <!--end::Button-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <thead>
                            <tr>

                                <th width="280px"><strong>N°</strong></th>
                                <th width="280px"><strong>Nom Et Prenom </strong></th>
                                <th width="280px"><strong>Date Début</strong></th>
                                <th width="280px"><strong>Date Fin</strong></th>
                                <th width="280px"><strong>Type Congé</strong></th>
                                <th width="280px"><strong>Statuts</strong></th>
                                <th width="280px"><strong>Nombre jours</strong></th>
                                
                                <th width="280px"><strong>Actions</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $conges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($conge->id); ?></td>

                                    <td><?php echo e($conge->user->name); ?> <?php echo e($conge->user->prenom); ?></td>
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

                                    <td>
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                                    viewbox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->

                                            <div class="menu-item px-3">

                                                <a href="<?php echo e(route('conges.edit', $conge->id)); ?>" class="menu-link px-3">

                                                    Modifier
                                                </a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="<?php echo e(route('conges.show', $conge->id)); ?>" class="menu-link px-3">
                                                    Afficher
                                                </a>
                                            </div>



                                            <!--end::Menu item-->
                                            <div class="menu-item px-3">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['conges.destroy', $conge->id], 'style' => 'display:inline']); ?>

                                                <?php echo Form::submit('Supprimer', ['class' => 'menu-link px-3', 'onclick' => 'return confirmDelete(event)']); ?>

                                                <?php echo Form::close(); ?>


                                            </div>
                                            <style>
                                                .confirm-dialog {
                                                    position: fixed;
                                                    top: 50%;
                                                    left: 60%;
                                                    transform: translate(-50%, -250%);
                                                    background-color: #3987ee;
                                                    border-radius: 5px;
                                                    border: 1px solid #3987ee;
                                                    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
                                                    padding: 20px;
                                                    max-width: 500px;
                                                    margin: 0 auto;
                                                    text-align: center;
                                                }

                                                .confirm-dialog h2 {
                                                    margin-top: 0;
                                                }

                                                .confirm-dialog p {
                                                    margin-bottom: 2px;
                                                }

                                                .confirm-dialog .btn {
                                                    margin-right: 10px;
                                                }
                                            </style>

                                            <script>
                                                function confirmDelete(event) {
                                                    event.preventDefault(); // Empêche l'envoi du formulaire par défaut

                                                    // Créer la boîte de dialogue personnalisée
                                                    var confirmDialog = document.createElement('div');
                                                    confirmDialog.classList.add('confirm-dialog');

                                                    var title = document.createElement('h2');
                                                    title.textContent = 'Confirmation';
                                                    confirmDialog.appendChild(title);

                                                    var message = document.createElement('p');
                                                    message.textContent = 'Êtes-vous sûr de vouloir supprimer cet congé ?';
                                                    confirmDialog.appendChild(message);

                                                    var confirmBtn = document.createElement('button');
                                                    confirmBtn.classList.add('btn', 'btn-secondary');
                                                    confirmBtn.textContent = 'Confirmer';
                                                    confirmBtn.addEventListener('click', function() {
                                                        event.target.closest('form').submit();
                                                        document.body.removeChild(confirmDialog);
                                                    });
                                                    confirmDialog.appendChild(confirmBtn);

                                                    var cancelBtn = document.createElement('button');
                                                    cancelBtn.classList.add('btn', 'btn-secondary');
                                                    cancelBtn.textContent = 'Annuler';
                                                    cancelBtn.addEventListener('click', function() {
                                                        document.body.removeChild(confirmDialog);
                                                    });
                                                    confirmDialog.appendChild(cancelBtn);

                                                    // Ajouter la boîte de dialogue au corps de la page
                                                    document.body.appendChild(confirmDialog);
                                                }
                                            </script>


                                        </div>
                                        <!--end::Menu-->
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>



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

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/conges/user.blade.php ENDPATH**/ ?>