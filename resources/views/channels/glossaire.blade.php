@extends('backoff.app')

@section('content')


    <h4 class="page-title d-inline-block mr-2">
       Édition d'un canal
    </h4>

    <div class="float-right">
        <a href="{{action('ChannelController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

@if( $channel != null )

    <div class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li class="active"> <a href="{{action("ChannelController@show" , $channel)}}">Générales</a> </li>

            <li class="active"> <a href=""#">Glossaire</a> </li>
        </ul>
    </div>
@endif

    {!! Form::model(
      $channel,
      array(
          'class'     => 'form-horizontal',
          'url'       => action('ChannelController@updateGlossary' , $channel),
          'method'    => 'Post'
      )
      ) !!}

 <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h6>Desciption</h6>
                {!! Form::text( 'description' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la description" ) ) !!}
            </div>
        </div>
  </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h6>Format(s)</h6>
                {!! Form::text( 'format' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez les formats souhaités" ) ) !!}
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

@endsection