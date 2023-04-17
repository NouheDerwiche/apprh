@extends('test.index')
@section('content')
<div class="fv-row mb-10">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>
                Afficher le rôle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Annuler</a>
        </div>
    </div>
</div>

<div class="v-row mb-10">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <strong>Nom de Role:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="fv-row mb-10">
            <strong>Autorisation:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

