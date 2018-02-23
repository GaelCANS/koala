@extends('backoff.app')

@section('content')

    <div class="box-header with-border">
        <h3 class="pull-left">
            @if( $campaign == null ) Création @else Edition @endif d'une campagne @if( $campaign != null )<small class="text-capitalize">{{$campaign->name}} </small> @endif
        </h3>

        <a href="{{action('CampaignController@index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Retour</a>
    </div>


    {!! Form::model(
        $campaign,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('CampaignController@'.($campaign == null ? 'store' : 'update') , $campaign),
            'method'    => $campaign == null ? 'Post' : 'Put'
        )
    ) !!}

    <div class="box-body with-border">

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::select('status',$status , null, ['class' => 'form-control select2']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Nom</label>
                {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom de la campagne" ) ) !!}
                {!! Form::hidden( 'saved' , 1  ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Objectif(s) de la campagne</label>
                {!! Form::textarea( 'description' , null , array( 'class' => 'form-control' ) ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Responsable de la campagne</label>
                {!! Form::select('user_id',$users , null, ['class' => 'form-control select2']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Début</label>
                {!! Form::text( 'begin' , null , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Fin</label>
                {!! Form::text( 'end' , null , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                Validation CMM
                <label for="cmm1">Oui</label>
                {!! Form::radio( 'cmm' , 1 , false , array('id' => 'cmm1' ) ) !!}
                <label for="cmm0">Non</label>
                {!! Form::radio( 'cmm' , 0 , false , array('id' => 'cmm0' , ($campaign == null ? 'checked="checked"' : '') ) ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Commentaires</label>
                {!! Form::textarea( 'cmm_comments' , null , array( 'class' => 'form-control' ) ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Résultats</label>
                {!! Form::textarea( 'results' , null , array( 'class' => 'form-control' ) ) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Ressources</label>
                {!! Form::text( 'resource_link' , null , array( 'class' => 'form-control' , 'placeholder' => 'Chemin APUBLIC' ) ) !!}
            </div>
        </div>


        @include('campaigns.channels')

        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-fw fa-plus"></i>Enregister
                </button>
            </div>
        </div>

    </div>

    {!! Form::close() !!}


@endsection