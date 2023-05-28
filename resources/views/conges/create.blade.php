@extends('test.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Nouveau congé') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('conges.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Utilisateur') }}</label>

                                <div class="col-md-6">
                                    <select id="user_id" class="form-control @error('user_id') is-invalid @enderror" name="user_id" required>

                                        @if(auth()->check())
                                            <option value="{{ auth()->user()->id }}" {{ old('user_id') == auth()->user()->id  }}>{{ auth()->user()->name  }}  {{ auth()->user()->prenom }}</option>
                                        @endif
                                    </select>

                                    @error('user_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="date_debut" class="col-md-4 col-form-label text-md-right">{{ __('Date de début') }}</label>

                                <div class="col-md-6">
                                    <input id="date_debut" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut') }}" required autocomplete="date_debut" autofocus>

                                    @error('date_debut')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_fin" class="col-md-4 col-form-label text-md-right">{{ __('Date de fin') }}</label>

                                <div class="col-md-6">
                                    <input id="date_fin" type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin') }}" required autocomplete="date_fin">

                                    @error('date_fin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_conge" class="col-md-4 col-form-label text-md-right">{{ __('Type de congé') }}</label>

                                <div class="col-md-6">
                                    <select id="type_conge" class="form-control @error('type_conge') is-invalid @enderror" name="type_conge" required>
                                        <option value="">Sélectionner un type de congé</option>
                                        <option value="conge malade">Congé malade</option>
                                        <option value="conge maternite">Congé maternité</option>
                                        <option value="conge solde">Congé payé</option>
                                        <option value="conge non solde">Congé non payé</option>
                                    </select>

                                    @error('type_conge')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
<div class="form-group row">
<label for="status" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>
<div class="col-md-6">
    <label for="status">Status:</label>
    <select class="form-control" id="status" name="status">
        <option value="en attente">En attente</option>

    </select>
    @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>
<div class="form-group row mb-0">
<div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">

        {{ __('Ajouter') }}
    </button>
    @if(auth()->user()->hasRole('admin')){
        <a href="{{ route('conges.index') }}" class="btn btn-secondary">}
            @elseif(auth()->user()->hasRole('employe'))
                <a href="{{ route('conges.user') }}" class="btn btn-secondary">

            @endif
        {{ __('Annuler') }}
    </a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection