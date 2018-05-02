@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
       @if( $service == null ) Création @else Édition @endif d'un service @if( $service != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('ServiceController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        {!! Form::model(
            $service,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('ServiceController@'.($service == null ? 'store' : 'update') , $service),
                'method'    => $service == null ? 'Post' : 'Put'
            )
        ) !!}

    <div class="row mb-3">
        <div class="col-md-4 grid-margin">
            <div class="form-group">
                <h6>Nom du service</h6>
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

    </div>

@endsection