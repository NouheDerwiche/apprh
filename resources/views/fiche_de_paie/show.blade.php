@extends('test.index')


@extends('layouts.app')

@section('content')
    <h1>Détails de la fiche de paie</h1>

    <p><strong>ID :</strong> {{ $ficheDePaie->id }}</p>
    <p><strong>Utilisateur :</strong> {{ $ficheDePaie->user->name }}</p>
    <p><strong>Mois :</strong> {{ $ficheDePaie->month }}</p>
    <p><strong>Salaire total :</strong> {{ $ficheDePaie->salaire_total }}</p>
    <p><strong>Salaire final :</strong> {{ $ficheDePaie->salairefinal }}</p>

    <a href="{{ route('fiche_de_paie.index') }}">Retour à la liste des fiches de paie</a>
@endsection

