@extends('test.index')
@section('content')
<div class="container-xxl">
    <div class="col-lg-12 margin-tb">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <h1>Modifier tâche</h1>
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-light-primary" href="{{ route('tache.index') }}">Retour</a>
        </div>
    </div>
</div>

<div class="container-xxl">
    <div class="card card-flush">
        <div class="card-header mt-6">
            <div class="card-title">
                {!! Form::model($tache, ['method' => 'PATCH', 'route' => ['tache.update', $tache->id]]) !!}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Nom:</strong>
                            {!! Form::text('nom', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Projet:</strong>
                            {!! Form::select('projet_id', [$tache->projet_id => $tache->projet->titre], null, array('class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Description:</strong>
                            {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Localisation:</strong>
                            {!! Form::text('localisation', null, array('placeholder' => 'Localisation','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Début:</strong>
                            {!! Form::date('debut', null, array('placeholder' => 'Début','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Fin:</strong>
                            {!! Form::date('fin', null, array('placeholder' => 'Fin','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <strong>Nombre d'heures:</strong>
                            {!! Form::text('nb_heures', null, array('placeholder' => 'Nombre d\'heures','class' => 'form-control')) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 mb-3 col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-light-primary">Enregistrer</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
