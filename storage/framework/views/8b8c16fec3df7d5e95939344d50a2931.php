<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html>
<head>
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>
<body>

<div class="container">
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProjet"> Créer nouveau projet</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Titre</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="projetForm" name="projetForm" class="form-horizontal">
                   <input type="hidden" name="projet_id" id="projet_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Titre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrer nom projet" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Date début</label>
                        <div class="col-sm-12">
                            <input type="date" id="debut" name="debut" required="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Date fin</label>
                        <div class="col-sm-12">
                            <input type="date" id="fin" name="fin" required class="form-control">
                        </div>
                    </div>


                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
  $(function () {

    /*------------------------------------------
     --------------------------------------------
     Pass Header Token
     --------------------------------------------
     --------------------------------------------*/
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });

    /*------------------------------------------
    --------------------------------------------
    Render DataTable
    --------------------------------------------
    --------------------------------------------*/
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "<?php echo e(route('projet.index')); ?>",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'titre', name: 'titre'},
            {data: 'debut', name: 'debut'},
            {data: 'fin', name: 'fin'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Button
    --------------------------------------------
    --------------------------------------------*/
    $('#createNewProjet').click(function () {
        $('#saveBtn').val("create-projet");
        $('#projet_id').val('');
        $('#projetForm').trigger("reset");
        $('#modelHeading').html("Create New Projet");
        $('#ajaxModel').modal('show');
    });

    /*------------------------------------------
    --------------------------------------------
    Click to Edit Button
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.editProjet', function () {
      var projet_id = $(this).data('id');
      $.get("<?php echo e(route('projet.index')); ?>" +'/' + projet_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Projet");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#projet_id').val(data.id);
          $('#titre').val(data.titre);
          $('#debut').val(data.debut);
          $('#fin').val(data.fin);

      })
    });

    /*------------------------------------------
    --------------------------------------------
    Create Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#projetForm').serialize(),
          url: "<?php echo e(route('projet.store')); ?>",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#projetForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save');
          }
      });
    });

    /*------------------------------------------
    --------------------------------------------
    Delete Product Code
    --------------------------------------------
    --------------------------------------------*/
    $('body').on('click', '.deleteProjet', function () {

        var projet_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "<?php echo e(route('projet.store')); ?>"+'/'+projet_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

  });
</script>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/projet.blade.php ENDPATH**/ ?>