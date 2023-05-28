@extends('test.index')

@section('content')
    <h1>Ajouter un jour férié</h1>
<div>
    <a href="{{ route('holidays.index') }}" class="btn btn-primary">Retour</a>
</div>
    <form method="POST" action="{{ route('holidays.store') }}" class="form">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" width="280px" class="form-control">
        </div>
        <div class="form-group">
            <label  width="280px" for="date">Date Debut</label>
            <input type="date" id="date" name="date" width="280px" class="form-control">
        </div>
        <div class="form-group">
            <label  width="280px" for="date">Date Fin</label>
            <input type="date" id="date2" name="date2" width="280px" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection

@section('styles')
    <style>
        .form {
            max-width: 500px;
            margin: auto;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-control {
            width: 10%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 10px;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border: none;
        }
        .btn:hover {
            background-color: #0069d9;
        }
    </style>
@endsection
