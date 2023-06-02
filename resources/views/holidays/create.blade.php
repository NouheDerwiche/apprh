@extends('test.index')

@section('content')


<div class=" container-xxl ">

    <div class="col-lg-12 margin-tb">
        <div class="container">
            <h1> Ajouter un jour férié</h1>
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-light-primary" href="{{ route('holidays.index') }}"> Retour</a>
        </div>

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
    <div class="card-title" >
        <!--begin::Search-->
        <form method="POST" action="{{ route('holidays.store') }}" class="form">
            <div class="row ">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" width="280px" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="date">Date Debut</label>
                <input type="date" id="date" name="date" width="280px" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="date2">Date Fin</label>
                <input type="date" id="date2" name="date2" width="280px" class="form-control">
            </div>
            <button type="submit" class="btn mb-3 btn-primary">Ajouter</button>
        </form>
    </div>

</div>

</div>
</div>
@endsection
