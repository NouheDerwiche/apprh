@extends('test.index')
@section('content')
    <h1>Modifier la fiche de paie</h1>

    <!-- Formulaire de modification de la fiche de paie -->
    <form action="{{ route('fiche_de_paie.update', $ficheDePaie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="user_id">Utilisateur :</label>
            <select name="user_id" id="user_id">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @if($user->id === $ficheDePaie->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="month">Mois :</label>
            <input type="date" name="month" id="month" value="{{ $ficheDePaie->month }}">
        </div>
        <div>
            <label for="salaire_total">Salaire total :</label>
            <input type="text" name="salaire_total" id="salaire_total" value="{{ $ficheDePaie->salaire_total }}">
        </div>
        <div>
            <label for="salairefinal">Salaire final :</label>
            <input type="text" name="salairefinal" id="salairefinal" value="{{ $ficheDePaie->salairefinal }}">
        </div>
        <button type="submit">Modifier</button>
    </form>
@endsection
