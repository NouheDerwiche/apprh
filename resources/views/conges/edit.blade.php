@extends('test.index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">


                <div class="card-header">{{ __('Modifier le congé') }}</div>

                {{-- Afficher tous les éléments --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('conges.update', $conge) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Utilisateur') }}</label>

                            <div class="col-md-6">
                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if ($user->id == old('user_id', $conge->user_id)) selected @endif>{{ $user->name }}</option>
                                    @endforeach
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
                                <input id="date_debut" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut', $conge->date_debut) }}">

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
                                <input id="date_fin" type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin', $conge->date_fin) }}">

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
                                <select id="type_conge" name="type_conge" class="form-control @error('type_conge') is-invalid @enderror">
                                    <option value="conge malade" @if (old('type_conge', $conge->type_conge) == 'conge malade') selected @endif>{{ __('Congé malade') }}</option>
                                    <option value="conge maternite" @if (old('type_conge', $conge->type_conge) == 'conge maternite') selected @endif>{{ __('Congé maternité') }}</option>
                                    <option value="conge solde" @if (old('type_conge', $conge->type_conge) == 'conge solde') selected @endif>{{ __('Congé soldé') }}</option>
                                    <option value="conge non solde" @if (old('type_conge', $conge->type_conge) == 'conge non solde') selected @endif>{{ __('Congé non-soldé') }}</option>
                                    </select>
                                    @error('type_conge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Statut') }}</label>

                            <div class="col-md-6">
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="en attente" @if (old('status', $conge->status) == 'en attente') selected @endif>{{ __('En attente') }}</option>
                                    @if(auth()->user()->hasRole('Admin'))
                                    <option value="accepte" @if (old('status', $conge->status) == 'accepte') selected @endif>{{ __('Accepté') }}</option>
                                    <option value="refuse" @if (old('status', $conge->status) == 'refuse') selected @endif>{{ __('Refusé') }}</option>
@endif
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
                                    {{ __('Modifier le congé') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
