@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
        @if( $generator == null ) Création @else Édition @endif d'un générateur de lead @if( $generator != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('GeneratorController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        {!! Form::model(
            $generator,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('GeneratorController@'.($generator == null ? 'store' : 'update') , $generator),
                'method'    => $generator == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nom du générateur de lead</h6>
                    {!! Form::text( 'wording' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du générateur de lead" ) ) !!}
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