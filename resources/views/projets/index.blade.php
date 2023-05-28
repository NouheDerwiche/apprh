@extends('test.index')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Gestion des projets</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('projets.create') }}"> Creer nouveau Projet</a>

        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Titre</th>
        <th>Date debut</th>
        <th>Date fin</th>
        <th width="280px">Action</th>
    </tr>
    @php
  $i = 0;
@endphp
    @foreach ($projets as $key => $projet)
    <tr>
        <td> {{ ++$i }}</td>
        <td>{{ $projet->titre }}</td>
        <td>{{ $projet->debut }}</td>
        <td>{{ $projet->fin }}</td>

        <td class="text-end">
            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                Actions
                <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                    </svg>
                </span>
            </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <div class="menu-item px-3">
                    <a href="{{ route('projets.show', $projet->id) }}" class="menu-link px-3">
                        Show
                    </a>
                </div>
                <div class="menu-item px-3">
                    <a href="{{ route('projets.edit', $projet->id) }}" class="menu-link px-3">
                        Edit
                    </a>
                </div>
                <div class="menu-item px-3">
                    <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="menu-link px-3">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </td>

    </tr>
    @endforeach
</table>



@endsection
