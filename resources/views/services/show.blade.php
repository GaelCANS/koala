@extends('backoff.app')

@section('content')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="pull-left">
                @if( $service == null ) Création @else Edition @endif d'un service @if( $service != null )<small class="text-capitalize">{{$service->name}} </small> @endif
            </h3>

            <a href="{{action('ServiceController@index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Retour</a>
        </div>

        {!! Form::model(
            $service,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('ServiceController@'.($service == null ? 'store' : 'update') , $service),
                'method'    => $service == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="box-body with-border">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nom du service</label>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du service" ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="disabled1">Oui</label>
                    {!! Form::radio( 'disabled' , 1 , false , array('id' => 'disabled1') ) !!}
                    <label for="disabled0">Non</label>
                    {!! Form::radio( 'disabled' , 0 , false , array('id' => 'disabled0') ) !!}
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