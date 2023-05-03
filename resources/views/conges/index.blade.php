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
            <th>
        <div class="col-md-6 col-xl-6 mb-xxl-10">
            <!--begin::Card widget 8-->
<div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
<!--begin::Card body-->
<div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
    <!--begin::Statistics-->
    <div class="mb-4 px-9">
        <!--begin::Info-->
        <div class="d-flex align-items-center mb-2">
                                <!--begin::Currency-->
                <!--end::Currency-->


            <!--begin::Value-->
            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">12</span>
            <!--end::Value-->

            <!--begin::Label-->
                                <span class="badge badge-light-success fs-base">

<!--end::Svg Icon-->
                   Jours                  </span>

            <!--end::Label-->
        </div>
        <!--end::Info-->

        <!--begin::Description-->
        <span class="fs-6 fw-semibold text-gray-400">Nombre Totale De Conges Par Ans</span>
        <!--end::Description-->
    </div>
    <!--end::Statistics-->


</div>
<!--end::Card body-->
</div>
</th>
<th>
    <div class="col-md-6 col-xl-6 mb-xxl-10">
        <!--begin::Card widget 8-->
<div class="card overflow-hidden h-md-50 mb-5 mb-xl-10">
<!--begin::Card body-->
<div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
<!--begin::Statistics-->
<div class="mb-4 px-9">
    <!--begin::Info-->
    <div class="d-flex align-items-center mb-2">
                            <!--begin::Currency-->
            <!--end::Currency-->


        <!--begin::Value-->
        <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">1,5</span>
        <!--end::Value-->

        <!--begin::Label-->
                            <span class="badge badge-light-success fs-base">

<!--end::Svg Icon-->
               Jours                  </span>

        <!--end::Label-->
    </div>
    <!--end::Info-->

    <!--begin::Description-->
    <span class="fs-6 fw-semibold text-gray-400">Nombre Totale De Conges Par Mois</span>
    <!--end::Description-->
</div>
<!--end::Statistics-->


</div>
<!--end::Card body-->
</div>
</th>

</tr>
</thead>
</table>
<!--end::Card widget 8-->
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
               </td>
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
    </div>
@endsection
