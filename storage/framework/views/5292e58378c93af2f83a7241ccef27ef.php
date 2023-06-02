<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Nouveau congé')); ?></div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('conges.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Utilisateur')); ?></label>

                                <div class="col-md-6">
                                    <select id="user_id" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="user_id" required>

                                        <?php if(auth()->check()): ?>
                                            <option value="<?php echo e(auth()->user()->id); ?>" <?php echo e(old('user_id') == auth()->user()->id); ?>><?php echo e(auth()->user()->name); ?>  <?php echo e(auth()->user()->prenom); ?></option>
                                        <?php endif; ?>
                                    </select>

                                    <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="date_debut" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date de début')); ?></label>

                                <div class="col-md-6">
                                    <input id="date_debut" type="date" class="form-control <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_debut" value="<?php echo e(old('date_debut')); ?>" required autocomplete="date_debut" autofocus>

                                    <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_fin" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date de fin')); ?></label>

                                <div class="col-md-6">
                                    <input id="date_fin" type="date" class="form-control <?php $__errorArgs = ['date_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_fin" value="<?php echo e(old('date_fin')); ?>" required autocomplete="date_fin">

                                    <?php $__errorArgs = ['date_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_conge" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Type de congé')); ?></label>

                                <div class="col-md-6">
                                    <select id="type_conge" class="form-control <?php $__errorArgs = ['type_conge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type_conge" required>
                                        <option value="">Sélectionner un type de congé</option>
                                        <option value="conge malade">Congé malade</option>
                                        <option value="conge maternite">Congé maternité</option>
                                        <option value="conge solde">Congé payé</option>
                                        <option value="conge non solde">Congé non payé</option>
                                    </select>

                                    <?php $__errorArgs = ['type_conge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
<div class="form-group row">
<label for="status" class="col-md-4 col-form-label text-md-right"><?php echo e(__('status')); ?></label>
<div class="col-md-6">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status">
        <option value="en attente">En attente</option>

    </select>
    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
</div>
<div class="form-group row mb-0">
<div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">

        <?php echo e(__('Ajouter')); ?>

    </button>
    <?php if(auth()->user()->hasRole('admin')): ?>{
        <a href="<?php echo e(route('conges.index')); ?>" class="btn btn-secondary">}
            <?php elseif(auth()->user()->hasRole('employe')): ?>
                <a href="<?php echo e(route('conges.user')); ?>" class="btn btn-secondary">

            <?php endif; ?>
        <?php echo e(__('Annuler')); ?>

    </a>
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

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/conges/create.blade.php ENDPATH**/ ?>