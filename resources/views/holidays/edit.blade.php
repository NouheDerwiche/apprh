@extends('test.index')

@section('content')


<div class=" container-xxl ">

    <div class="col-lg-12 margin-tb">
        <div class="container">
            <h1> Modifié un jour férié</h1>
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-light-primary" href="{{ route('holidays.index') }}"> Retour</a>
        </div>

</div>

    <!--begin::Post-->
    <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div class=" container-xxl ">

            <!--begin::Card-->
            <div class="card card-flush ">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->

                        <form method="POST" action="{{ route('holidays.update', $holiday->id) }}">
                            <div class="row ">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="name">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $holiday->name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="date">Date Debut</label>
                                    <input type="date" class="form-control" id="date" name="date"
                                        value="{{ $holiday->date }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="date">Date Fin</label>
                                    <input type="date" class="form-control" id="date2" name="date2"
                                        value="{{ $holiday->date2 }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    @endsection
