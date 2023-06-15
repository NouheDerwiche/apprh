<?php $__env->startSection('content'); ?>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <h1> taches</h1>
    </div>

    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->

        <div class=" container-xxl ">

            <!--begin::Card-->
            <div class="card card-flush ">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->


                    <!--end::Card title-->
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

                            <form action="<?php echo e(route('tache.index')); ?>" method="GET" role="search">
                                <!--end::Svg Icon-->
                                <input type="text"
                                    class="form-control form-control-solid w-250px ps-15" name="term" placeholder="chercher tache" id="term">
                            </form>

                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Button-->



                        <!--end::Button-->
                    </div>





                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>
                        <!--begin::Table head-->
                        <thead>

                            <!--begin::Table row-->
                            <tr>
                                <th width="280px">N°</th>
                                <th width="280px">Nom</th>
                                <th width="280px">Description</th>
                                <th width="280px">Localisation</th>
                                <th width="280px">Date debut</th>
                                <th width="280px">Date fin</th>
                                <th width="280px">Nombre d'heures</th>

                                <th>Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody>
                            <?php $i = 0; ?>
                            <?php $__currentLoopData = $taches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tache): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($tache): ?>
                                    <tr>

                                        <td>
                                            <?php echo e(++$i); ?>


                                        </td>
                                        <!--begin::Name--->
                                        <td><?php echo e($tache->nom); ?> </td>
                                        <!--end::Name--->

                                        <!--begin::Assigned to--->
                                        <td>
                                            <?php echo e($tache->description); ?>


                                        </td>
                                        <td>
                                            <?php echo e($tache->localisation); ?>

                                        </td>
                                        <style>
                                            .badge-blue {
                                                background-color: rgb(37, 129, 209);
                                                color: white;
                                            }
                                        </style>
                                        <td>
                                            <?php echo e($tache->debut); ?>


                                        </td>
                                        <td>
                                            <?php echo e($tache->fin); ?>


                                        </td>
                                        <td>
                                            <?php echo e($tache->nb_heures); ?>


                                        </td>
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

                                                    <a href="<?php echo e(route('tache.edit', $tache->id)); ?>" class="menu-link px-3">

                                                        Modifier
                                                    </a>
                                                </div>
                                                <div class="menu-item px-3">
                                                    <a href="<?php echo e(route('tache.show', $tache->id)); ?>" class="menu-link px-3">
                                                        Afficher
                                                    </a>
                                                </div>



                                                <!--end::Menu item-->
                                                <div class="menu-item px-3">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['tache.destroy', $tache->id], 'style' => 'display:inline']); ?>

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
                                                        message.textContent = 'Êtes-vous sûr de vouloir supprimer cette tache ?';
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
                                        <!--end::Action--->
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <?php echo e($taches->links('pagination::bootstrap-4')); ?>

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
                        background-color: #007bff;
                        color: #fff;
                        border-color: #007bff;
                    }
                </style>

                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/tache/index.blade.php ENDPATH**/ ?>