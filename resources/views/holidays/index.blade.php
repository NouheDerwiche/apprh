@extends('test.index')

@section('content')
    <h1>Liste des jours fériés</h1>
<!--begin::Card toolbar-->
<div class="card-toolbar">
    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


    <!--begin::Add user-->

    <a class="btn btn-primary" href="{{ route('holidays.create') }}">  Ajouter un jour férié</a>
   </div>
</div>




    <table class="table">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <thead>
            <tr>
                <th width="280px">Nom</th>
                <th width="280px">Date</th>
                <th  width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($holidays as $holiday)
                <tr>
                    <td>{{ $holiday->name }}</td>
                    <td>{{ $holiday->date }}</td>
                    <td>

                        <a class="btn btn-light btn-active-primary my-1 me-2" href="{{ route('holidays.edit', $holiday->id) }}">Modifier</a>


                        <a class="btn btn-light btn-active-primary my-1 me-2" href="{{ route('holidays.show', $holiday->id) }}">Afficher</a>


                        {!! Form::open(['method' => 'DELETE','route' => ['holidays.destroy', $holiday->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Supprimer', ['class' => 'btn btn-light btn-active-primary my-1 me-2', 'onclick' => 'return confirmDelete(event)']) !!}
                    {!! Form::close() !!}


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

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
