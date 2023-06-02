@extends('test.index')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Détails du congé') }}</div>

        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ __('Utilisateur') }}</td>
                        <td>{{ $conge->user->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Date de début') }}</td>
                        <td>{{ $conge->date_debut }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Date de fin') }}</td>
                        <td>{{ $conge->date_fin }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Type de congé') }}</td>
                        <td>{{ $conge->type_conge }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Statut') }}</td>
                        <td>{{ $conge->status }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <a href="{{ route('conges.user') }}" class="btn btn-secondary">{{ __('Retour à la liste des congés') }}</a>
                @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-primary">{{ __('Modifier le congé') }}</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
