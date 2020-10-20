@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
        @if( $segment == null ) Création @else Édition @endif d'un segment @if( $segment != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('SegmentController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        {!! Form::model(
            $segment,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('SegmentController@'.($segment == null ? 'store' : 'update') , $segment),
                'method'    => $segment == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nom du segment</h6>
                    {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le nom du segment" ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Abbréviation</h6>
                    {!! Form::text( 'abbreviation' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez l'abbréviation du segment" ) ) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Class CSS</h6>
                    {!! Form::text( 'class_css' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez la classe du segment" ) ) !!}
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