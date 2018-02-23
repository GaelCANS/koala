@extends('backoff.app')

@section('content')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="pull-left">
                @if( $market == null ) Création @else Edition @endif d'un marché @if( $market != null )<small class="text-capitalize">{{$market->name}} </small> @endif
            </h3>

            <a href="{{action('MarketController@index')}}" class="btn btn-primary pull-right"><i class="fa fa-angle-left"></i> Retour</a>
        </div>

        {!! Form::model(
            $market,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('MarketController@'.($market == null ? 'store' : 'update') , $market),
                'method'    => $market == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="box-body with-border">

            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Nom du marché</label>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du marché" ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="abbreviation">Abbréviation</label>
                    {!! Form::text( 'abbreviation' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez l'abbréviation du marché" ) ) !!}
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="class_css">Class CSS</label>
                    {!! Form::text( 'class_css' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la classe du marché" ) ) !!}
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