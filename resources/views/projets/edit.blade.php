@extends('test.index')
@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class="container-xxl">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Modifier projet</h1>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-light-primary" href="{{ route('projets.index') }}"> Annuler</a>
            </div>
            <!--begin::Card-->
            <div class="card card-flush mt-6">
                <!--begin::Card header-->
                <div class="card-header d-flex justify-content-center">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <form action="{{ route('projets.update', $projet->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Titre:</strong>
                                        <input type="text" name="titre" value="{{ $projet->titre }}" class="form-control mb-3" placeholder="Titre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Date début :</strong>
                                        <input type="date" name="debut" value="{{ $projet->debut }}" class="form-control mb-3" placeholder="Date début">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Date fin :</strong>
                                        <input type="date" name="fin" value="{{ $projet->fin }}" class="form-control" placeholder="Date fin">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <strong>Description :</strong>
                                        <textarea name="description" class="form-control mb-3" placeholder="Description">{{ $projet->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
