<?php $__env->startSection('content'); ?>
    <h1>Ajouter un jour férié</h1>
<div>
    <a href="<?php echo e(route('holidays.index')); ?>" class="btn btn-primary">Retour à la liste des jours fériés</a>
</div>
    <form method="POST" action="<?php echo e(route('holidays.store')); ?>" class="form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" width="280px" class="form-control">
        </div>
        <div class="form-group">
            <label  width="280px" for="date">Date</label>
            <input type="date" id="date" name="date" width="280px" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <style>
        .form {
            max-width: 500px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 10%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 10px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #0069d9;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/holidays/create.blade.php ENDPATH**/ ?>