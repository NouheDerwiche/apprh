@extends('test.index')
@section('content')

    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->

        <!--begin::Card-->
        <div class="card card-flush ">
            <!--begin::Card header-->
            <div class="card-header mt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <div>
                        <div class="card-header">
                            <h2>Ajouter un nouveau projet</h2>
                        </div>
                        <div class="">
                            <a class="btn btn-primary" href="{{ route('projets.index') }}">Retour</a>
                            <br><br>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Oups !</strong> Il y a eu quelques problèmes avec votre saisie.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('projets.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="titre">Titre :</label>
                                    <input type="text" name="titre" class="form-control" id="titre"
                                        placeholder="Titre du projet">
                                </div>

                                <div class="form-group">
                                    <label for="debut">Date de début :</label>
                                    <input type="date" name="debut" class="form-control" id="debut"
                                        placeholder="Date de début du projet">
                                    @error('debut')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="fin">Date de fin :</label>
                                    <input type="date" name="fin" class="form-control" id="fin"
                                        placeholder="Date de fin du projet">
                                    @error('fin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
