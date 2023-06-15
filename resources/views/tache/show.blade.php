@extends('test.index')
@section('content')
<div class="container-xxl">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Détails de la tâche</h1>
            </div>
            <style>
                  .form-group strong {
                                        display: inline-block;
                                        width: 150px;
                                        font-weight: bold;
                                        margin-right: 10px;
                                    }
                                    .form-group .badge {
                                        margin-right: 5px;
                                        font-size: 0.8em;
                                    }
                                    .col-xs-12 {
                                        margin-bottom: 20px;
                                    }
                                    .mb-10 {
                                        margin-bottom: 10px;
                                    }
                                    .form-group {
                                        margin-bottom: 10px;
                                    }
            </style>
            <div class="pull-right mb-3">
                <a class="btn btn-light-primary" href="{{ route('tache.index') }}">Retour</a>
            </div>
        </div>
    </div>

    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <div class="container-xxl">
            <div class="card card-flush">
                <div class="card-header mt-6">
                    <div class="card-title">
                        <table class="table table-bordered justify-content-center align-items-center" style="width: 900px; height: 300px; margin: 4%">
                            <tbody>
                                <tr>
                                    <th>Projet :</th>
                                    <td>{{ $tache->projet->titre }}</td>
                                </tr>
                                <tr>
                                    <th>Nom :</th>
                                    <td>{{ $tache->nom }}</td>
                                </tr>
                                <tr>
                                    <th>Description :</th>
                                    <td>{{ $tache->description }}</td>
                                </tr>
                                <tr>
                                    <th>Localisation :</th>
                                    <td>{{ $tache->localisation }}</td>
                                </tr>
                                <tr>
                                    <th>Début :</th>
                                    <td>{{ $tache->debut }}</td>
                                </tr>
                                <tr>
                                    <th>Fin :</th>
                                    <td>{{ $tache->fin }}</td>
                                </tr>
                                <tr>
                                    <th>Nombre d'heures :</th>
                                    <td>{{ $tache->nb_heures }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
