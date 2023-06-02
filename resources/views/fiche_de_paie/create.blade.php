@extends('test.index')
@section('content')


<h1>Créer une fiche de paie</h1>

<!-- Formulaire de création de la fiche de paie -->
<form action="{{ route('fiche_de_paie.store') }}" method="POST">
    @csrf
    <div>
        <label for="user_id">Utilisateur :</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="month">Mois :</label>
        <input type="date" name="month" id="month">
    </div>
    <div>
        <label for="salaire_total">Salaire total :</label>
        <input type="text" name="salaire_total" id="salaire_total">
    </div>
    <div>
        <label for="salairefinal">Salaire final :</label>
        <input type="text" name="salairefinal" id="salairefinal">
    </div>
    <button type="submit">Créer</button>
</form>
@endsection
