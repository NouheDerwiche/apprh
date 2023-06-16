@extends('test.index')
@section('content')
    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class=" container-xxl ">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1> Ajouter projet</h1>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-light-primary" href="{{ route('projets.index') }}"> Annuler</a>
            </div>
            <!--begin::Card-->
            <!--begin::Card-->
            <div class="card card-flush mt-6">
                <!--begin::Card header-->
                <div class="card-header d-flex justify-content-center">
                    <!--begin::Card title-->
                    <div class="card-title">



                        <form action="{{ route('projets.store') }}" method="POST" class="mb-4">

                            @csrf
                            <div class="row ">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="titre">Titre :</label>
                                        <input type="text" name="titre" width="280px" class="form-control"
                                            id="titre" placeholder="Titre du projet">
                                        @error('titre')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="debut">Date de début :</label>
                                        <input type="date" name="debut" width="280px" class="form-control"
                                            id="debut" placeholder="Date de début du projet">
                                        @error('debut')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="fin">Date de fin :</label>
                                        <input type="date" name="fin" width="280px" class="form-control"
                                            id="fin" placeholder="Date de fin du projet">
                                        @error('fin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">

                                        <div class="card">
                                            <label for="description">Description</label>

                                            <input type="description" name="description" width="280px" class="form-control"
                                                id="description" placeholder="description">
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
