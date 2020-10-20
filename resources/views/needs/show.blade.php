@extends('backoff.app')

@section('content')

    <h4 class="page-title d-inline-block mr-2">
        @if( $need == null ) Création @else Édition @endif d'un univers de besoin @if( $need != null ) @endif
    </h4>

    <div class="float-right">
        <a href="{{action('NeedController@index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>

        {!! Form::model(
            $need,
            array(
                'class'     => 'form-horizontal',
                'url'       => action('NeedController@'.($need == null ? 'store' : 'update') , $need),
                'method'    => $need == null ? 'Post' : 'Put'
            )
        ) !!}

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h6>Nom de l'univers de besoin</h6>
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