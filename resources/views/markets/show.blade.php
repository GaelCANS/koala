@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
        @if( $market == null ) Création @else Édition @endif d'un marché @if( $market != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('MarketController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        {!! Form::model(
            $market,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('MarketController@'.($market == null ? 'store' : 'update') , $market),
                'method'    => $market == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nom du marché</h6>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du marché" ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Abbréviation</h6>
                    {!! Form::text( 'abbreviation' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez l'abbréviation du marché" ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Class CSS</h6>
                    {!! Form::text( 'class_css' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la classe du marché" ) ) !!}
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