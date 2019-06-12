@extends('backoff.app')

@section('content')




    <h4 class="page-title d-inline-block mr-2">
        Tag @if($tag != null) "{{$tag->name}}" @endif
    </h4>


    <div class="float-right">
        <a href="{{route('tags-index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>


    {!! Form::model(
        $tag,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('TagController@'.($tag == null ? 'store' : 'update') , $tag),
            'method'    => $tag == null ? 'Post' : 'Put'
        )
    ) !!}

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tag</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" @if($tag != null) href="{{ route('tag-associate' , array('id' => $tag)) }}" @endif >Association</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h6>Nom</h6>
                        {!! Form::text( 'name' , null , array( 'class' => 'form-control' , 'placeholder' => "Saisissez le tag" ) ) !!}
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

    </div>

    {!! Form::close() !!}

    </div>

@endsection