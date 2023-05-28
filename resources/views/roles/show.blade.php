@extends('test.index')
@section('content')
<div class="fv-row mb-10">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Afficher le rôle</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}">Annuler</a>
        </div>
    </div>
</div>

<table class="table table-striped">
    <tbody>
        <tr>
            <td><strong>Nom de Role:</strong></td>
            <td>{{ $role->name }}</td>
        </tr>
        <tr>
            <td><strong>Autorisation:</strong></td>
            <td>
                @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
    <span class="fa fa-check-circle"></span> {{ $v->name }}<br>
@endforeach
                @endif
            </td>
        </tr>
    </tbody>
</table>

@endsection
