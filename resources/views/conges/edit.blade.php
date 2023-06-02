@extends('test.index')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <h1> Modifier conge </h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">




                {{-- Afficher tous les éléments --}}

                <div class="card-body">
                    @php
                        $origin = new DateTime($conge->date_debut);
                        $target = new DateTime($conge->date_fin);
                        $interval = $origin->diff($target);
                        $duree = $interval->format('%a');

                    @endphp
                    <form method="POST" action="{{ route('conges.update', $conge) }}">
                        @csrf
                        <input type="hidden" value="{{ $duree }}" name="conge_duree">
                        @method('PUT')

                        <div class="form-group row ">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Utilisateur') }}</strong></label>

                            <div class="col-md-6 mb-3">
                                <select id="user_id" name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                                    @if (auth()->check())
                                    <option value="{{ auth()->user()->id }}"
                                        {{ old('user_id') == auth()->user()->id }}>{{ auth()->user()->name }}
                                        {{ auth()->user()->prenom }}</option>
                                @endif
                                </select>

                                @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="date_debut" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Date de début') }}</strong></label>

                            <div class="col-md-6  mb-3">
                                <input id="date_debut" onchange="test()" type="date" class="form-control @error('date_debut') is-invalid @enderror" name="date_debut" value="{{ old('date_debut', $conge->date_debut) }}">

                                @error('date_debut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_fin" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Date de fin') }}</strong></label>

                            <div class="col-md-6  mb-3">
                                <input id="date_fin" onchange="test()" type="date" class="form-control @error('date_fin') is-invalid @enderror" name="date_fin" value="{{ old('date_fin', $conge->date_fin) }}">

                                @error('date_fin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type_conge" onchange="test()" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Type de congé') }}</strong></label>

                            <div class="col-md-6  mb-3">
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
                            <label for="status" class="col-md-4 col-form-label text-md-right"><strong>{{ __('Statut') }}</strong></label>

                            <div class="col-md-6  mb-3">
                                <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="en attente" @if (old('status', $conge->status) == 'en attente') selected @endif>{{ $conge->status }}</option>

                                </select>


                            </div>

                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" onchange="test()">
                                    {{ __('Modifier ') }}
                                </button>
                                <a class="btn btn-light-primary" href="{{ route('conges.user') }}"> Annuler</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function test() {
 var type = document.getElementById('type_conge').value;
 var d1 = new Date(document.getElementById('date_debut').value);
 var d2 = new Date(document.getElementById('date_fin').value);

 if (d2 < d1) {
     Swal.fire('Erreur', '', 'error');
     document.getElementById('date_fin').value = null;
 } else {
     if (d1 && d2 && type && (type == 'conge solde' || type == 'conge malade')) {
         var x = dateDiffInDays(d1, d2);
         var userSolde = {!! auth()->user()->solde !!};

         if (x > userSolde) {
             Swal.fire('Solde Insuffisant', '', 'warning');
             document.getElementById('date_fin').value = null;
         } else if (x < userSolde) {
             var soldeRestant = Math.abs(x - userSolde);
             Swal.fire('Félicitations', 'Votre solde restant est ' + soldeRestant + ' jour(s) de congé si cette demande est acceptée', 'success');
         }
     }
 }
}


     function dateDiffInDays(a, b) {
         const _MS_PER_DAY = 1000 * 60 * 60 * 24;
         // Discard the time and time-zone information.
         const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
         const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

         return Math.floor((utc2 - utc1) / _MS_PER_DAY);
     }
 </script>

        @endsection
