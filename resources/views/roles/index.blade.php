@extends('test.index')
@section('content')
<div>
<div class="fv-row mb-10">
      <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion des rôles</h2>
        </div>

<div>
    <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->

        <div>
            <div class="menu-item menu-accordion">
                <div class="">

                    <form action="{{ route('roles.index') }}" method="GET" role="search" >

                        <div class="input-group" >
                            <span class="menu-bullet">
                                <button class="btn btn-primary" type="submit" title="chercher par Roles ">
                                    <span class="fas fa-search"></span>
                                </button>
                            </span>
                            <input type="text" class="form-control mr-2" name="term" placeholder="chercher roles" id="term">
                            <a href="{{ route('roles.index') }}" class=" mt-1">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button" title="Refresh page">
                                        <span class="fas fa-sync-alt"></span>
                                    </button>
                                </span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
        <!--end::Search-->
        </div>
        <!--begin::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
        <!--begin::Toolbar-->
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


        <!--begin::Add user-->
        @can('role-create')
        <a class="btn btn-primary" href="{{ route('roles.create') }}">  Nouveau Rôle</a>
        @endcan</div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
      </div>

<table class="table table-bordered">
  <tr>
     <th width="280px">N°</th>
     <th width="280px">Nom de Role</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-light btn-active-primary my-1 me-2" href="{{ route('roles.show',$role->id) }}">Afficher</a>
            @can('role-edit')
                <a class="btn btn-light btn-active-primary my-1 me-2" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
            @endcan
            @can('role-delete')
            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Supprimer', ['class' => 'btn btn-light btn-active-primary my-1 me-2', 'onclick' => 'return confirmDelete(event)']) !!}
            {!! Form::close() !!}
            @endcan

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
                        message.textContent = 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?';
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
                        message.textContent = 'Êtes-vous sûr de vouloir supprimer cet utilisateur ?';
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
    @endforeach
</table>


{!! $roles->render() !!}
                </div>

</div>
@endsection
