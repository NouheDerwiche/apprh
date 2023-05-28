@extends('test.index')

@section('content')
    <div class="container">
        <h1 class="mt-4">Modifier un jour férié</h1>
    <div><a href="{{ route('holidays.index') }}" class="btn btn-primary">Retour</a>

    </div>

        <form method="POST" action="{{ route('holidays.update', $holiday->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $holiday->name }}">
            </div>
            <div class="form-group">
                <label for="date">Date Debut</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $holiday->date }}">
            </div>
            <div class="form-group">
                <label for="date">Date Fin</label>
                <input type="date" class="form-control" id="date2" name="date2" value="{{ $holiday->date2 }}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
