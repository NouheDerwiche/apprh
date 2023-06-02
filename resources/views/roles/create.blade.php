@extends('test.index')

@section('content')
<div class="container-xxl">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Ajouter un rôle</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-light-primary" href="{{ route('roles.index') }}">Annuler</a>
            </div>
        </div>
    </div>

    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            <div class="card card-flush">
                <div class="card-header mt-6">
                    <div class="card-title">
                        <div class="fv-row mb-10">
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
                                        <strong>Autorisation:</strong>
                                        <br/>
                                        @foreach($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
