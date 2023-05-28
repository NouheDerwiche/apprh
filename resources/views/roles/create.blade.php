@extends('test.index')
@section('content')
<div class="fv-row mb-10">
    <div class="col-lg-12 margin-tb">
        <div class="fs-5 fw-bold form-label mb-2">
            <h2>Créer un nouveau rôle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">Annuler</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Oups !</strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Nom de Role:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Nom','class' => 'form-control form-control-solid')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Autorisation :</strong>
            <br/>
            <div class="form-check">
                @foreach($permission as $value)
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->id }}" id="permission{{ $value->id }}">
                    <label class="form-check-label text-dark" for="permission{{ $value->id }}">{{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</div>
{!! Form::close() !!}



@endsection
