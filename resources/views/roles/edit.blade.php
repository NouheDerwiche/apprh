@extends('test.index')
@section('content')
<div class="fv-row mb-10">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Modifier le rôle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Annuler</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        Oups !</strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="rfv-row mb-10">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Nom:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control form-control-solid')) !!}
        </div>
    </div>
    <div class="fv-row">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Autorisation:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
