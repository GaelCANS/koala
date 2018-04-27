@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
        @if( $parameter == null ) Création @else Édition @endif d'un paramètre @if( $parameter != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('ParameterController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

    {!! Form::model(
        $parameter,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('ParameterController@'.($parameter == null ? 'store' : 'update') , $parameter),
            'method'    => $parameter == null ? 'Post' : 'Put'
        )
    ) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h6>Nom</h6>
                {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du paramètre" ) ) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h6>Catégorie</h6>
                {!! Form::text( 'category' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la catégorie du paramètre" ) ) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <h6>Valeur</h6>
                @if ($parameter == null || strlen($parameter->value) < 50)
                    {!! Form::text( 'value' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la valeur du paramètre" ) ) !!}
                    @else
                    {!! Form::textarea( 'value' , null , array( 'class' => 'form-control '.( $parameter != null && $parameter->value != strip_tags($parameter->value) ? 'summernote' : '' ) , 'placeholder' => "Saisissez la valeur du paramètre", 'rows' => ( $parameter != null && $parameter->value != strip_tags($parameter->value) ? '30' : '8' ) ) ) !!}
                @endif
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