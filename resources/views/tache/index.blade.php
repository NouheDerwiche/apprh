@extends('test.index')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Gestion des tâches</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tache.create') }}">Ajouter une tâche</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Localisation</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Nombre d'heures</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($taches as $key => $tache)
                    <tr>
                        <td>{{ $tache->id }}</td>
                        <td>{{ $tache->nom }}</td>
                        <td>{{ $tache->description }}</td>
                        <td>{{ $tache->localisation }}</td>
                        <td>{{ $tache->debut }}</td>
                        <td>{{ $tache->fin }}</td>
                        <td>{{ $tache->nb_heures }}</td>

                        <td class="text-end">
                            <div class="dropdown">
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
                                        <a href="{{ route('tache.show', $tache->id) }}" class="menu-link px-3">
                                            Show
                                        </a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="{{ route('tache.edit', $tache->id) }}" class="menu-link px-3">
                                            Edit
                                        </a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <form action="{{ route('tache.destroy', $tache->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="menu-link px-3">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
