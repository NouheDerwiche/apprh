@extends('test.index')

@section('content')





<!--begin::Post-->
<div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
<div class=" container-xxl ">
    <div class=" container-xxl ">

        <div class="col-lg-12 margin-tb">

            <div class="pull-right mb-3">
                <a class="btn btn-light-primary" href="{{ route('holidays.index') }}"> Retour</a>
            </div>

    </div>
<!--begin::Card-->
<div class="card card-flush ">
<!--begin::Card header-->
<div class="card-header mt-6">
<!--begin::Card title-->
<div class="card-title">
<!--begin::Search-->





<div class="fv-row mb-10">
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <h1>Détails du jour férié</h1>
    </div>
    <style>
        .form-group strong {
            display: inline-block;
            width: 150px;
            font-weight: bold;
            margin-right: 10px;
        }
        .form-group label {
            background-color: #51c76e;
            display: inline-block;
            margin-right: 5px;
            margin-bottom: 5px;
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
        .badge-success {
            background-color: #28a745;
        }
        /* Ajouter d'autres styles CSS ici si nécessaire */
    </style>
    <table class="table table-bordered justify-content-center align-items-center" style="width: 900px; height: 300px; margin: 4%">
        <tbody>
            <tr>
                <th>Nom</th>
                <td> {{ $holiday->name }}</td>
            </tr>
            <tr>
                <th>Date debut</th>
                <td> {{$holiday->date }}</td>
            </tr>
            <tr>
                <th>Date Fin</th>
                <td> {{$holiday->date2}}</td>
            </tr>
        </tbody>
    </table>

</div>





</div>
</div>
</div>
</div>
@endsection
