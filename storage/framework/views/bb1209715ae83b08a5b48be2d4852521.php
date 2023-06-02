<?php $__env->startSection('content'); ?>
    <div class=" container-xxl ">



        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <h1> Ajouter utilisateur</h1>
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-light-primary" href="<?php echo e(route('users.index')); ?>"> Annuler</a>
        </div>



        <!--begin::Post-->
        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->


            <!--begin::Card-->
            <div class="card card-flush ">

                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <strong>
                            Oups !</strong> Il y a eu des problèmes avec votre entrée.<br><br>
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->


                        <?php echo Form::open(['route' => 'users.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']); ?>

                        <div class="row ">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Nom</strong>
                                    <?php echo Form::text('name', null, ['placeholder' => 'Nom', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Prénom</strong>
                                    <?php echo Form::text('prenom', null, ['placeholder' => 'Prénom', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Téléphone</strong>
                                    <?php echo Form::text('phone', null, ['placeholder' => 'phone', 'class' => 'form-control']); ?>

                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Address</strong>
                                    <?php echo Form::text('address', null, ['placeholder' => 'address', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Cin</strong>
                                    <?php echo Form::text('cin', null, ['placeholder' => 'cin', 'class' => 'form-control']); ?>

                                </div>
                            </div>






                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Matricule</strong>
                                    <?php echo Form::text('num_emp', null, ['placeholder' => 'num_emp', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Ville</strong>
                                    <?php echo Form::text('ville', null, ['placeholder' => 'ville', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Code postal</strong>
                                    <?php echo Form::text('codepostal', null, ['placeholder' => 'codepostal', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Date de naissance</strong>
                                    <?php echo Form::text('date_naiss', null, ['placeholder' => 'date_naiss', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Salaire</strong>
                                    <?php echo Form::text('salaire', null, ['placeholder' => 'salaire', 'class' => 'form-control']); ?>

                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Solde</strong>
                                    <?php echo Form::text('solde', null, ['placeholder' => 'solde', 'class' => 'form-control']); ?>

                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <?php echo Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']); ?>


                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Mot de passe</strong>
                                    <?php echo Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']); ?>

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Confirmez le mot de passe</strong>
                                    <?php echo Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']); ?>


                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Role</strong>
                                    <?php echo Form::select('roles[]', $roles, [], ['class' => 'form-control']); ?>


                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Avatar</strong>
                                    <input type="file" name="avatar" id="avatar" class="form-control "
                                        style="color: rgb(29, 115, 244);">

                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-light-primary">Enregistrer</button>
                            </div>

                        </div>





                    </div>


                    <!-- Reste du code... -->
                    <?php echo Form::close(); ?>








                    <style>
                        .mini-input {
                            border: 1px solid #ccc;
                            padding: 5px 10px;
                            font-size: 12px;
                            width: 150px;
                        }
                    </style>
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/users/create.blade.php ENDPATH**/ ?>