@extends('test.index')
@section('content')
<div class=" container-xxl ">
    <div class="fv-row mb-10">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1> Ajouter utilisateur</h1>
            </div>
            <div class="pull-right">
                <a class="btn btn-light-primary" href="{{ route('users.index') }}"> Annuler</a>
            </div>
        </div>
    </div>

                           <!--begin::Post-->
                           <div class="post fs-6 d-flex flex-column-fluid" id="kt_post">
                            <!--begin::Container-->


    <!--begin::Card-->
    <div class="card card-flush ">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>
              Oups !</strong> Il y a eu des problèmes avec votre entrée.<br><br>
          <ul>
             @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
             @endforeach
          </ul>
        </div>
      @endif
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->


                {!! Form::open(array('route' => 'users.store','method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
                <div class="row ">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                      <strong>Nom</strong>
                      {!! Form::text('name', null, array('placeholder' => 'Nom','class' => 'form-control')) !!}
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <strong>Prénom</strong>
                      {!! Form::text('prenom', null, array('placeholder' => 'Prénom','class' => 'form-control')) !!}
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Téléphone</strong>
                        {!! Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
                    </div>
                 </div>


                 <div class="col-md-6 mb-3">
                    <div class="form-group">
                     <strong>Address</strong>
                        {!! Form::text('address', null, array('placeholder' => 'address','class' => 'form-control')) !!}
                  </div>
                 </div>
                 <div class="col-md-6 mb-3">
                    <div class="form-group">
                    <strong>Cin</strong>
                    {!! Form::text('cin', null, array('placeholder' => 'cin','class' => 'form-control')) !!}
                </div>
                   </div>






                   <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Matricule</strong>
                        {!! Form::text('num_emp', null, array('placeholder' => 'num_emp','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Ville</strong>
                        {!! Form::text('ville', null, array('placeholder' => 'ville','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Code postal</strong>
                        {!! Form::text('codepostal', null, array('placeholder' => 'codepostal','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Date de naissance</strong>
                        {!! Form::text('date_naiss', null, array('placeholder' => 'date_naiss','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Salaire</strong>
                        {!! Form::text('salaire', null, array('placeholder' => 'salaire','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Solde</strong>
                        {!! Form::text('solde', null, array('placeholder' => 'solde','class' => 'form-control')) !!}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Email</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Mot de passe</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Confirmez le mot de passe</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Role</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}

                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <strong>Avatar</strong>
                        <input type="file" name="avatar" id="avatar" class="form-control " style="color: rgb(29, 115, 244);">

                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-light-primary">Enregistrer</button>
                </div>

            </div>





                </div>


                <!-- Reste du code... -->
                {!! Form::close() !!}







                    <style>   .mini-input {
                        border: 1px solid #ccc;
                        padding: 5px 10px;
                        font-size: 12px;
                        width: 150px;
                      }
                      </style>
            </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
        </div>
        <!--end::Container-->                	</div>
@endsection

