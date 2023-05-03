<!-- resources/views/conges/index.blade.php -->

@extends('test.index')

@section('content')
    <div class="container">
        <h1>Liste des Congés </h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
<table>
    <thead>
        <tr>
             <!--begin::Col-->
    <div class="col-xxl-6 mb-md-5 mb-xl-10">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10">
            <!--begin::Col-->
            <div class="col-md-6 col-xl-6 mb-xxl-10">
                <th>
                    <!--begin::Card widget 5-->
    <div class="card card-flush h-md-50 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Amount-->
                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">12</span>
                    <!--end::Amount-->

                    <!--begin::Badge-->
                    <span class="badge badge-light-success fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

    <!--end::Svg Icon-->
                      Jours
                    </span>
                    <!--end::Badge-->
                </div>
                <!--end::Info-->

                <!--begin::Subtitle-->
                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Total Par Ans</span>
                <!--end::Subtitle-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->


    </div>
    <!--end::Card widget 5-->            </div>
                <!--end::Col--></th><th>
                <!--begin::Card widget 5-->
<div class="card card-flush h-md-50 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">1,5</span>
                <!--end::Amount-->

                <!--begin::Badge-->
                <span class="badge badge-light-success fs-base">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

<!--end::Svg Icon-->
                  Jours
                </span>
                <!--end::Badge-->
            </div>
            <!--end::Info-->

            <!--begin::Subtitle-->
            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Total Par Mois</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->


</div>
<!--end::Card widget 5-->            </div>
            <!--end::Col--></th>
            <th>
                <!--begin::Card widget 5-->
<div class="card card-flush h-md-50 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Amount--> @foreach ($conges as $conge)
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">@if(abs($conge->duree - 12) > 12)
                    0
                @else
                    {{ abs($conge->duree - 12) }}
                @endif</span>
                <!--end::Amount-->
@endforeach
                <!--begin::Badge-->
                <span class="badge badge-light-danger fs-base">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

<!--end::Svg Icon-->
                  Jours
                </span>
                <!--end::Badge-->
            </div>
            <!--end::Info-->

            <!--begin::Subtitle-->
            <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Restant Par Ans</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->


</div>
<!--end::Card widget 5-->            </div>
            <!--end::Col--></th>

                <th>
                    <!--begin::Card widget 5-->
    <div class="card card-flush h-md-50 mb-xl-10">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    @auth
                    <!--begin::Amount-->
                    @foreach ($conges as $conge)
                        @if(Auth::user()->id == $conge->user_id)
                            <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ Auth::user()->solde }}</span>
                        @endif
                    @endforeach
                    <!--end::Amount-->
                @endauth

                    <!--begin::Badge-->
                    <span class="badge badge-light-danger fs-base">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->

    <!--end::Svg Icon-->
                      Jours
                    </span>
                    <!--end::Badge-->
                </div>
                <!--end::Info-->

                <!--begin::Subtitle-->
                <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Conges Restant Par Mois</span>
                <!--end::Subtitle-->
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->


    </div>
    <!--end::Card widget 5-->            </div>
                <!--end::Col--></th>
        </tr>
    </thead>
</table>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>User name</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Type congé</th>
                    <th>status</th>
                    <th>solde</th>
                    <th>Durée</th>
                    <th>Durée1</th>
                    <th>Durée2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conges as $conge)
                    <tr>
                        <td>{{ $conge->id }}</td>
                        <td>{{ $conge->user_id }}</td>
                        <td>{{ $conge->user->name }}</td>

                        <td>{{ $conge->date_debut }}</td>
                        <td>{{ $conge->date_fin }}</td>
                        <td>{{ $conge->type_conge }}</td>
                        <td class="status-cell @if ($conge->status == 'en attente') bg-secondary
                            @elseif ($conge->status == 'accepte') bg-success
                            @elseif ($conge->status == 'refuse') bg-danger
                            @endif">
                   @if ($conge->status == 'en attente')
                       <i class="fas fa-clock"></i> {{ __('En attente') }}
                   @elseif ($conge->status == 'accepte')
                       <i class="fas fa-check"></i> {{ __('Accepté') }}
                   @elseif ($conge->status == 'refuse')
                       <i class="fas fa-times"></i> {{ __('Refusé') }}
                   @endif
               </td><td></td>
                        <td>{{ $conge->duree }} jours</td>
                        <td>@if(abs($conge->duree - 12) > 12)
                            0
                        @else
                            {{ abs($conge->duree - 12) }}
                        @endif
                            jours</td>
                        <td>@if(abs($conge->duree - 1.5) > 1.5)
                            0
                        @else
                            {{ abs($conge->duree - 1.5) }}
                        @endif
                            jours</td> <!-- display the duration property -->
                        <td>
                            <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('conges.destroy', $conge->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                <a href="{{ route('conges.show', ['conge' => $conge->id]) }}" class="btn btn-secondary">{{ __('show') }}</a>

                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('conges.create') }}" class="btn btn-success">Ajouter un congé</a>



<style>
    .bg-secondary {
    background-color: #454b51; /* gris */
    color: #fff;
    width: 100px; height: 50px;
}

.bg-success {
    background-color: #28a745; /* vert */
    color: #fff;
    width: 100px; height: 50px;
}

.bg-danger {
    background-color: #dc3545; /* rouge */
    color: #fff;
    width: 10px; height: 5px;
}

    </style>



    </div>
@endsection
