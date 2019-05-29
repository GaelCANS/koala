@extends('backoff.app')

@section('content')



    <h4 class="page-title d-inline-block mr-2">
        @if( $channel == null ) Création @else Édition @endif d'un canal @if( $channel != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('ChannelController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>




        {!! Form::model(
        $channel,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('ChannelController@'.($channel == null ? 'store' : 'update') , $channel),
            'method'    => $channel == null ? 'Post' : 'Put'
        )
        ) !!}

    <div class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li class="active"> <a href="#">Générales</a> </li>
            <li @if( $channel == null ) class="disabled" @endif > <a href=@if( $channel != null )"{{action('ChannelController@showglossaire' , $channel)}}"@else"#"@endif>Glossaire</a> </li>



          </ul>
      </div>



      <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                  <h6>Nom du canal</h6>
                  {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du canal" ) ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h6>Class Name</h6>
            {!! Form::text( 'class_name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la classe du canal" ) ) !!}
            </div>
        </div>
    </div>

    <div id="liste-indicators" >
    @if (isset($channel->Indicators))
        @forelse($channel->Indicators as $indicator)
            @include('channels.template_add_indicator',array('indicator'=>$indicator))
            @empty
        @endforelse
    @endif
    </div>

    <div class="row ">
        <h6 class="mt-1">Ressources</h6>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="wrapper">
                <div class="d-flex">
                    {!! Form::text( 'resource_link' , null , array( 'class' => 'form-control bg-light' , 'placeholder' => 'Copier/coller le chemin texte APUBLIC' ) ) !!}
                </div>
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

    @if ($channel != null)
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="button" id="btn-add-indicator">
                        <i class="fa fa-plus"></i>Ajouter
                    </button>
                </div>
            </div>
        </div>
    @endif

    {!! Form::hidden('channel_id',$channel == null ? '' : $channel->id ) !!}



        {!! Form::close() !!}

    @include('channels.template_add_new_indicator',array('indicator'=>null))

@endsection