<!-- resources/views/taches/create.blade.php -->

@extends('test.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="pull-right mb-3">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <h1>Ajouter tâche</h1>
                    </div>
                    <a class="btn btn-light-primary" href="{{ route('calendar') }}"> Annuler</a>
                </div>
                <div class="card">


                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('tache.store') }}">
                            @csrf
                        <div>
                            <select name="projet_id" id="projet_id" class="form-control">
                                <option value="">Sélectionner un projet</option>
                                @foreach($projets as $projet)
                                    <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                                @endforeach
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" name="nom" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description :</label>
                                <textarea name="description" class="form-control" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="localisation">Localisation :</label>
                                <input type="text" name="localisation" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="debut">Date de début :</label>
                                <input type="date" name="debut" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="fin">Date de fin :</label>
                                <input type="date" name="fin" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nb_heures">Nombre d'heures :</label>
                                <input type="number" name="nb_heures" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
