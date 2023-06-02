<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <h1> Roles</h1>
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
            <div class="card-title">
                <!--begin::Search-->

                <div class="d-flex align-items-center position-relative my-1 me-5">



                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
    <span class="svg-icon svg-icon-1 position-absolute ms-6"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
    </svg>
    </span>




    <form action="<?php echo e(route('roles.index')); ?>" method="GET">
    <!--end::Svg Icon-->                <input type="text"  class="form-control form-control-solid w-250px ps-15" name="q" placeholder="Chercher rôles">
    </form>

    </div>


    <!--end::Search-->
            </div>






            <!--end::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Button-->
                <a href="<?php echo e(route('roles.create')); ?>"  class="btn btn-light-primary" >
                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
    <span class="svg-icon svg-icon-3"><svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"></rect>
    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"></rect>
    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"></rect>
    </svg>
    </span>
    <!--end::Svg Icon-->               Ajouter
    </a>
                <!--end::Button-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
        <div style="display: flex; justify-content: center;">

            <table class="table table-bordered" style="width: 600px; height: 300px;">
<tbody>
              <tr>
                 <th width="280px">N°</th>
                 <th style="width: 280px; text-align: center;" >Nom de Role</th>
                 <th style="width: 1500px; text-align: center;">Action</th>

              </tr>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td style="width: 280px; text-align: center;">
                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2 text-primary"><?php echo e($role->name); ?></span>
                      </td>
                              <td style="width: 400px; text-align: center;">
                        <a class="btn btn-light btn-active-primary my-1 me-2" href="<?php echo e(route('roles.show',$role->id)); ?>">Afficher</a>

                            <a class="btn btn-light btn-active-primary my-1 me-2" href="<?php echo e(route('roles.edit',$role->id)); ?>">Modifier</a>

                        <?php echo Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']); ?>

                            <?php echo Form::submit('Supprimer', ['class' => 'btn btn-light btn-active-primary my-1 me-2', 'onclick' => 'return confirmDelete(event)']); ?>

                        <?php echo Form::close(); ?>



                        <style>.confirm-dialog {
                            position: fixed;
                            top: 50%;
                            left: 60%;
                            transform: translate(-50%, -250%);
                            background-color: #3987ee;
                            border-radius: 5px;
                            border: 1px solid #3987ee;
                            box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
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
                                    message.textContent = 'Êtes-vous sûr de vouloir supprimer cet Role ?';
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
                            <div>

                           <style>
                                .confirm-dialog {


                                    background-color: #3987ee;
                                    border-radius: 5px;
                                    border: 1px solid #3987ee;
                                    box-shadow: 0px 5px 15px rgba(0,0,0,0.2);
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
                                    message.textContent = 'Êtes-vous sûr de vouloir supprimer cet Role ?';
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



                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>

        </div>
        <?php echo e($roles->links('pagination::bootstrap-4')); ?>

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

                            </div>
</div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/roles/index.blade.php ENDPATH**/ ?>