@extends('backoff.app')

@section('content')
    <h4 class="page-title d-inline-block mr-2">Planning des campagnes</h4>
    <div class="row" id="container-calendar" data-day="{{ $day }}" data-link="{{ route('planning-events') }}">
        <div class="col-12">
            <ul class="list-inline">
                <h6>Canaux</h6>
                @foreach($channels as $channel)
                    <div id="channels" class="icheck-line">
                        {!! Form::checkbox('channels', $channel->name, true, array( 'class' => 'display-event' , 'id' => 'channel-'.$channel->id , 'data-class' => $channel->class_name , 'data-id' => $channel->id ) ) !!}
                        <label for="channel-{{$channel->id}}">
                            {{ $channel->name }}
                        </label>
                    </div>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection