@extends('test.index')

@section('content')
    <!--begin::Post-->


        <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div class="container-xxl">
                <div class="container-xxl">
                    <div class="fv-row mb-10">
                        <div class="col-lg-12 margin-tb">

                            <div class="pull-right">
                                <a class="btn btn-light-primary" href="{{ route('users.index') }}">Annuler</a>
                            </div>
                        </div>
                    </div>
                <!--begin::Card-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="fv-row mb-10">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <h1>Informations</h1>
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
                                            <th>Nom:</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Prenom:</th>
                                            <td>{{ $user->prenom }}</td>
                                        </tr>
                                        <tr>
                                            <th>Date de Naissance:</th>
                                            <td>{{ $user->date_naiss }}</td>
                                        </tr>
                                        <tr>
                                            <th>Cin:</th>
                                            <td>{{ $user->cin }}</td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Matricule:</th>
                                            <td>{{ $user->num_emp }}</td>
                                        </tr>
                                        <tr>
                                            <th>Ville:</th>
                                            <td>{{ $user->ville }}</td>
                                        </tr>
                                        <tr>
                                            <th>Code Postal:</th>
                                            <td>{{ $user->codepostal }}</td>
                                        </tr>
                                        <tr>
                                            <th>Téléphone:</th>
                                            <td>{{ $user->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Solde:</th>
                                            <td>{{ $user->solde }}</td>
                                        </tr>
                                        <tr>
                                            <th>Salaire:</th>
                                            <td>{{ $user->salaire }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email:</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Roles:</th>
                                            <td>
                                                @if(!empty($user->getRoleNames()))
                                                    @foreach($user->getRoleNames() as $v)
                                                        <label class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2 text-primary">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
    </div>
@endsection
