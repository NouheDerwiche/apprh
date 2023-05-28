@extends('test.index')
@section('content')





<div class=" container-xxl ">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1> Modifier Role</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-light-primary" href="{{ route('roles.index') }}"> Annuler</a>
            </div>
        </div>
    </div>


<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
<div class=" container-xxl ">

<!--begin::Card-->
<div class="card card-flush ">
<!--begin::Card header-->
<div class="card-header mt-6">
<!--begin::Card title-->
<div class="card-title">
<!--begin::Search-->



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

{!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
<div class="rfv-row mb-10">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Nom:</strong>
            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control form-control-solid']) !!}
        </div>
    </div>
    <div class="fv-row">
        <div class="fs-5 fw-bold form-label mb-2">
            <strong>Autorisations:</strong>
            <br/>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permission as $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td>
                                <label>
                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                    Cocher
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

@endsection
