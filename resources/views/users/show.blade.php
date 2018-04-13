@extends('backoff.app')

@section('content')



        <h4 class="page-title d-inline-block mr-2">
                @if( $user == null ) Création d'un utilisateur @else Mon compte @endif
        </h4>


        <div class="float-right">
            <a href="{{route('dashboard-index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
        </div>


        {!! Form::model(
            $user,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('UserController@'.($user == null ? 'store' : 'update') , $user),
                'files'    => true ,
                'method'    => $user == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nom</h6>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez votre nom" ) ) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h6>Prénom</h6>
                    {!! Form::text( 'firstname' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez votre prénom" ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <h6>Email</h6>
                    {!! Form::email( 'email' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez votre email" , ($user == null ? '' : 'disabled') ) ) !!}
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <h6>Service</h6>
                    {!! Form::select('services_id',$services , null, ['class' => 'js-example-placeholder-multiple js-states form-control toggle-tous force-placeholder', 'data-allow-clear' => 'true' , 'required' ]) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nouveau mot de passe</h6>
                    {!! Form::password( 'password' , array( 'class' => 'form-control') ) !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Confirmer le nouveau mot de passe</h6>
                    {!! Form::password( 'password_confirmation'  , array( 'class' => 'form-control' ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <h6>Photo de profil</h6>
                    {!! Form::file( 'avatar' , array( 'class' => 'form-control' ) ) !!}

                </div>


            </div>

        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-fw fa-save"></i>Enregister
                    </button>
                </div>
            </div>
        </div>

        {!! Form::close() !!}

    </div>

@endsection