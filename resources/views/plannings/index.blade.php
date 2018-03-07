@extends('backoff.app')

@section('content')

    <div class="row" id="container-calendar" data-day="{{ $day }}" data-link="{{ route('planning-events') }}">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body">

                    <ul class="list-inline">
                        @foreach($channels as $channel)
                            <li>
                                {!! Form::checkbox('channels', $channel->name, true, array( 'class' => 'display-event' , 'id' => 'channel-'.$channel->id , 'data-class' => $channel->class_name , 'data-id' => $channel->id ) ) !!}
                                <label for="channel-{{$channel->id}}">
                                    {{ $channel->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>

                    <h4 class="card-title">Planning des communications</h4>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

@endsection