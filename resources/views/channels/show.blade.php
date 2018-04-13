@extends('backoff.app')

@section('content')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="pull-left">
                @if( $channel == null ) Création @else Edition @endif d'un canal @if( $channel != null )<small class="text-capitalize">{{$channel->name}} </small> @endif
            </h3>

            <a href="{{action('ChannelController@index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Retour</a>
        </div>

        {!! Form::model(
            $channel,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('ChannelController@'.($channel == null ? 'store' : 'update') , $channel),
                'method'    => $channel == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="box-body with-border">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nom du canal</label>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du canal" ) ) !!}
                </div>
            </div>



            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Class Name</label>
                    {!! Form::text( 'class_name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la classe du canal" ) ) !!}
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