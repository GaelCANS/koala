@extends('backoff.app')

@section('content')
    <h4 class="page-title d-none mr-2">Planning des campagnes</h4>
    <div class="row" id="container-calendar" data-day="{{ $day }}" data-link="{{ route('planning-events') }}">
        <div class="col-12">
            <ul class="list-inline" id="list-channels">
                <h6>Canaux sélectionnés</h6>
                @foreach($channels as $channel)
                    <div id="channels" class="icheck-line {{$channel->class_name}}" >
                        {!! Form::checkbox('channels', $channel->name, true, array( 'class' => 'display-event' , 'id' => 'channel-'.$channel->id , 'data-class' => $channel->class_name , 'data-id' => $channel->id ) ) !!}
                        <label for="channel-{{$channel->id}}">
                            {{ $channel->name }}
                        </label>
                    </div>
                @endforeach
                <h6 class="mt-3">Services experts</h6>
                <div class="legend">
                    <span class="d-inline-block mr-4"><i class="fa fa-window-minimize" style="color:#fb9678;"></i>Canaux Digitaux</span>
                    <span class="d-inline-block mr-4"><i class="fa fa-window-minimize" style="color:hotpink"></i>CRM</span>
                    <span class="d-inline-block mr-4"><i class="fa fa-window-minimize" style="color:#3c589b;"></i>Communication</span>
                    <span class="d-inline-block"><i class="fa fa-window-minimize" style="color:blue"></i>Animation commerciale</span>


                </div>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div id="calendar" data-link="{{ route('update-event') }}"></div>
                </div>
            </div>
        </div>
    </div>
@endsection