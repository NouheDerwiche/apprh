@extends('test.index')
@section('content')
<!-- resources/views/fiche_de_paie/pdf.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche de paie</title>
    <style>
        /* Styles pour la mise en page du PDF */
        /* ... */
    </style>
</head>
<body>
    <h1>Fiche de paie</h1>

    <p><strong>ID :</strong> {{ $ficheDePaie->id }}</p>
    <p><strong>Utilisateur :</strong> {{ $ficheDePaie->user->name }}</p>
    <p><strong>Mois :</strong> {{ $ficheDePaie->month }}</p>
    <p><strong>Salaire total :</strong> {{ $ficheDePaie->salaire_total }}</p>
    <p><strong>Salaire final :</strong> {{ $ficheDePaie->salairefinal }}</p>
</body>
</html>

@endsection
