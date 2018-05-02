@extends('backoff.app')

@section('content')


    @include('channels.channel')

    <h4 class="page-title d-inline-block mr-2">
        @if( $channel == null ) Création @else Édition @endif d'un canal @if( $channel != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('ChannelController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

    @if ( $channel != null)
        {!! Form::model(

              null,
              array(
                  'class'     => 'form-horizontal',
                  'url'       => action('IndicatorController@store'),
                  'method'    => 'Post'
              )
          ) !!}
        @foreach( $channel -> Indicators as $indicator)
            @include('channels.indicator')
        @endforeach
        @include('channels.indicator', array('indicator'=>null))
        <button type="submit" class="btn btn-success">
            Enregister
        </button>
        {!! Form::hidden( 'channel_id' , $channel->id  ) !!}

            $channel,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('ChannelController@'.($channel == null ? 'store' : 'update') , $channel),
                'method'    => $channel == null ? 'Post' : 'Put'
            )
        ) !!}

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


    <div class="row">
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-fw fa-save"></i>Enregister
                </button>
            </div>
        </div>
    </div>

        </div>

        {!! Form::close() !!}
    @endif


@endsection