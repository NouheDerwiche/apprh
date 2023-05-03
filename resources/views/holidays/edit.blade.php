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
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $holiday->date }}">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
