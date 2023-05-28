<!-- resources/views/taches/index.blade.php -->

@extends('test.index')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a href="{{ route('tache.create') }}" class="btn btn-primary">Ajouter une tâche</a>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Liste des tâches</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Localisation</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Nombre d'heures</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taches as $tache)
                                <tr>
                                    <td>{{ $tache->id }}</td>
                                    <td>{{ $tache->nom }}</td>
                                    <td>{{ $tache->description }}</td>
                                    <td>{{ $tache->localisation }}</td>
                                    <td>{{ $tache->debut }}</td>
                                    <td>{{ $tache->fin }}</td>
                                    <td>{{ $tache->nb_heures }}</td>
                                    <td>{{ $tache->titre_projet }}</td>
                                    <td>
                                        <!-- Ajoutez ici les actions supplémentaires pour chaque tâche -->
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
