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

</tr>
</thead>
</table>

<!--end::Card widget 8-->
        <table class="table">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>User name</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Type congé</th>
                    <th>status</th>
                    <th>Nombre de jour</th>
                    <th>Solde</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conges as $conge)
                    <tr>
                        <td>{{ $conge->id }}</td>
                        <td>{{ $conge->user->name }}</td>

                        <td>{{ $conge->date_debut }}</td>
                        <td>{{ $conge->date_fin }}</td>
                        <td>{{ $conge->type_conge }}</td>
                        <td >
                            @if ($conge->status == 'en attente')
                                <span class="badge badge-light-warning fs-base">
                                    <i class="fas fa-clock"></i> {{ __('En attente') }}
                                </span>
                            @elseif ($conge->status == 'accepte')
                                <span class="badge badge-light-success fs-base">
                                    <i class="fas fa-check"></i> {{ __('Accepté') }}
                                </span>
                            @elseif ($conge->status == 'refuse')
                                <span class="badge badge-light-danger fs-base">
                                    <i class="fas fa-times"></i> {{ __('Refusé') }}
                                </span>
                            @endif
                        </td>
                        <td>{{ $conge->duree }} jours</td>


                        <td>{{ $conge->user->solde }}
                            </td>


                            @if(auth()->user()->hasRole('Admin'))
<td>


    <div class="col-md-6">

        <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" onchange="f( event,{{ $conge->id }} )" >

                             <option value="en attente"></option>

                <option value="accepte" @if (old('status', $conge->status) == 'accepte')  selected @endif>{{ __('Accepté') }}</option>
                <option value="refuse" @if (old('status', $conge->status) == 'refuse') selected @endif>{{ __('Refusé') }}</option>

        </select>

        @error('status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

</td>@endif


                        <!-- display the duration property -->
                       {{-- <td>
                            <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('conges.destroy', $conge->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                <a href="{{ route('conges.show', ['conge' => $conge->id]) }}" class="btn btn-secondary">{{ __('show') }}</a>

                            </form>
                        </td>--}}
                    </tr>
                @endforeach
            </tbody>
        </table>

<script>
function f(event,y){

var x= event.target.value
if (x=='accepte'){
    location.href='/conges/accepte/'+y
}
if (x=='refuse'){
    location.href='/conges/refuse/'+y
}
if (x=='en attente'){
    location.href='/conge/en attente/'+y
}


}


</script>


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
