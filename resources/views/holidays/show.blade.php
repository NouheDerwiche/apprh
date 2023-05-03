@extends('test.index')

@section('content')
<div class="container">
<h1 class="display-4">Détails du jour férié</h1>
<div class="card my-4">
<div class="card-header">
<h5 class="card-title mb-0"><strong>Nom :</strong> {{ $holiday->name }}</h5>
</div>
<div class="card-body">
<p class="card-text"><strong>Date :</strong> {{ $holiday->date }}</p>
</div>
</div>
<a href="{{ route('holidays.index') }}" class="btn btn-primary">Retour</a>
</div>
@endsection
