<?php $__env->startSection('content'); ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <h1> Ajouter conge </h1>
</div>


    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('conges.store')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label for="user_id"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Utilisateur')); ?></label>

                                <div class="col-md-6 mb-3">
                                    <select id="user_id" class="form-control <?php $__errorArgs = ['user_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="user_id" required>

                                        <?php if(auth()->check()): ?>
                                            <option value="<?php echo e(auth()->user()->id); ?>"
                                                <?php echo e(old('user_id') == auth()->user()->id); ?>><?php echo e(auth()->user()->name); ?>

                                                <?php echo e(auth()->user()->prenom); ?></option>
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
                                <label for="date_debut"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date de début')); ?></label>

                                <div class="col-md-6 mb-3">
                                    <input id="date_debut" onchange="test()" type="date"
                                        class="form-control <?php $__errorArgs = ['date_debut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_debut"
                                        value="<?php echo e(old('date_debut')); ?>" required autocomplete="date_debut" autofocus>

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
                                <label for="date_fin"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date de fin')); ?></label>

                                <div class="col-md-6 mb-3">
                                    <input id="date_fin" onchange="test()" type="date"
                                        class="form-control <?php $__errorArgs = ['date_fin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="date_fin"
                                        value="<?php echo e(old('date_fin')); ?>" required autocomplete="date_fin">

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
                                <label for="type_conge"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('Type de congé')); ?></label>

                                <div class="col-md-6 mb-3">
                                    <select id="type_conge" onchange="test()"
                                        class="form-control <?php $__errorArgs = ['type_conge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="type_conge"
                                        required>
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
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right"><?php echo e(__('status')); ?></label>
                                <div class="col-md-6 mb-3">

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
                            <div class="form-group row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">

                                        <?php echo e(__('Ajouter')); ?>

                                    </button>

                                    <a class="btn btn-light-primary" href="<?php echo e(route('conges.user')); ?>"> Annuler</a>



                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
       function test() {
    var type = document.getElementById('type_conge').value;
    var d1 = new Date(document.getElementById('date_debut').value);
    var d2 = new Date(document.getElementById('date_fin').value);

    if (d2 < d1) {
        Swal.fire('Erreur', '', 'error');
        document.getElementById('date_fin').value = null;
    } else {
        if (d1 && d2 && type && (type == 'conge solde' || type == 'conge malade')) {
            var x = dateDiffInDays(d1, d2);
            var userSolde = <?php echo auth()->user()->solde; ?>;

            if (x > userSolde) {
                Swal.fire('Solde Insuffisant', '', 'warning');
                document.getElementById('date_fin').value = null;
            } else if (x < userSolde) {
                var soldeRestant = Math.abs(x - userSolde);
                Swal.fire('Félicitations', 'Votre solde restant est ' + soldeRestant + ' jour(s) de congé si cette demande est acceptée', 'success');
            }
        }
    }
}


        function dateDiffInDays(a, b) {
            const _MS_PER_DAY = 1000 * 60 * 60 * 24;
            // Discard the time and time-zone information.
            const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
            const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

            return Math.floor((utc2 - utc1) / _MS_PER_DAY);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/conges/create.blade.php ENDPATH**/ ?>