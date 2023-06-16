<!-- resources/views/taches/create.blade.php -->

@extends('test.index')

@section('content')


<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
<div class=" container-xxl ">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <h1> Ajouter tache</h1>
    </div>
    <div class="pull-right mb-3">
        <a class="btn btn-light-primary" href="{{ route('tache.index') }}"> Annuler</a>
    </div>
<!--begin::Card-->

<!--begin::Search-->


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
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
                            <option value=""><strong>Sélectionner un projet</strong></option>
                            @foreach($projets as $projet)
                                <option value="{{ $projet->id }}">{{ $projet->titre }}</option>
                            @endforeach
                        </select>
                        @error('titre')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                        <div class="form-group mb-3">
                            <label for="nom"><strong>Nom :</strong></label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="description">Description :</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="localisation">Localisation :</label>
                            <input type="text" name="localisation" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="debut">Date de début :</label>
                            <input type="date" name="debut" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="fin">Date de fin :</label>
                            <input type="date" name="fin" class="form-control" required>
                        </div>

                        <div class="form-group mb-3">
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




</div>
</div>
</div>
</div>


@endsection
