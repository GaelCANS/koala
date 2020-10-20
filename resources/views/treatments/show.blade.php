@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
        @if( $treatment == null ) Création @else Édition @endif d'un traitement de lead @if( $treatment != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('TreatmentController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        {!! Form::model(
            $treatment,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('TreatmentController@'.($treatment == null ? 'store' : 'update') , $treatment),
                'method'    => $treatment == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nom du traitement de lead</h6>
                    {!! Form::text( 'wording' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du marché" ) ) !!}
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