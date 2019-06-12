@extends('backoff.app')

@section('content')




    <h4 class="page-title d-inline-block mr-2">
        Association des tags
    </h4>


    <div class="float-right">
        <a href="{{route('tags-index')}}" class="btn btn-info"><i class="fa fa-angle-left"></i> Retour</a>
    </div>


    {!! Form::model(
        $tag,
        array(
            'class'     => 'form-horizontal',
            'url'       => action('TagController@associate', $tag),
            'method'    => 'Post'
        )
    ) !!}

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link " href="{{ action('TagController@update' , $tag) }}" >Tag</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Association</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <div class="row">
                @foreach($channels as $channel)
                <div class="col-md-4">
                    <div class="form-group">

                        {!! Form::checkbox( 'channel['.$channel->id.']' , $channel->id , in_array($channel->id,$id_channels) , array( 'class' => 'form-check-input' , 'id' => "channel-".$channel->id ) ) !!}
                        <label class="form-check-label" for="channel-{{$channel->id}}">{{$channel->name}}</label>

                    </div>
                </div>
                @endforeach
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