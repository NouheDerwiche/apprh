@extends('test.index')
@section('content')
<div class="fv-row mb-10">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>  employe</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Annuler</a>
        </div>
    </div>
</div>


<div class="fv-row mb-10">
    <style>
        .form-group strong {

            display: inline-block;
            width: 150px;
            font-weight: bold;
            margin-right: 10px;
        }

        .form-group label {
            background-color: #51c76e;
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
        }

        .form-group .badge {
            margin-right: 5px;
            font-size: 0.8em;
        }

        .col-xs-12 {
            margin-bottom: 20px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .badge-success {
            background-color: #28a745;
        }

        /* Ajouter d'autres styles CSS ici si nécessaire */
    </style>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nom:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Prenom:</strong>
            {{ $user->prenom }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Date de Naissance:</strong>
            {{ $user->date_naiss}}
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cin:</strong>
                {{ $user->cin }}
            </div>
        </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Address:</strong>
            {{ $user->address }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Matricule:</strong>
            {{ $user->num_emp }}
        </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ville:</strong>
            {{ $user->ville }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code Postal:</strong>
            {{ $user->codepostal }}
        </div>
    </div>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Téléphone:</strong>
            {{ $user->phone }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
