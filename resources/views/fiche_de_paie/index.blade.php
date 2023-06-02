@extends('test.index')

@section('content')
<h1>Liste des fiches de paie</h1>

<a href="{{ route('fiche_de_paie.create') }}">Créer une nouvelle fiche de paie</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Utilisateur</th>
            <th>Mois</th>
            <th>Salaire total</th>
            <th>Salaire final</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($fichesDePaie as $ficheDePaie)
            <tr>
                <td>{{ $ficheDePaie->id }}</td>
                <td>{{ $ficheDePaie->user->name }}</td>
                <td>{{ $ficheDePaie->month }}</td>
                <td>{{ $ficheDePaie->salaire_total }}</td>
                <td>{{ $ficheDePaie->salairefinal }}</td>
                <td>
                    <a href="{{ route('fiche_de_paie.show', $ficheDePaie->id) }}">Afficher</a>
                    <a href="{{ route('fiche_de_paie.edit', $ficheDePaie->id) }}">Modifier</a>
                    <a href="{{ route('fiche_de_paie.imprimer', $ficheDePaie->id) }}">Imprimer</a>
                    <form action="{{ route('fiche_de_paie.destroy', $ficheDePaie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
