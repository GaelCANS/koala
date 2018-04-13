@extends('backoff.app')

@section('content')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="pull-left">
                @if( $user == null ) Création d'un utilisateur @else Mon compte @endif
            </h3>

            <a href="{{route('dashboard-index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Retour</a>
            <div style="clear: both"></div>
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

        <div class="box-body with-border">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nom</label>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez votre nom" ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="abbreviation">Prénom</label>
                    {!! Form::text( 'firstname' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez votre prénom" ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Email</label>
                    {!! Form::email( 'email' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez votre email" , ($user == null ? '' : 'disabled') ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Mot de passe</label>
                    {!! Form::password( 'password' , null , array( 'class' => 'form-control') ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Confirmer le mot de passe</label>
                    {!! Form::password( 'password_confirmation' , null , array( 'class' => 'form-control' ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Services</label>
                    {!! Form::select('services_id',$services , null, ['class' => 'js-example-placeholder-multiple js-states form-control toggle-tous force-placeholder', 'data-allow-clear' => 'true' , 'required' ]) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Avatar</label>
                    {!! Form::file( 'avatar' , array( 'class' => 'form-control' ) ) !!}
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-fw fa-plus"></i>Enregister
                    </button>
                </div>
            </div>

        </div>

        {!! Form::close() !!}

    </div>

@endsection