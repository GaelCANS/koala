@extends('backoff.app')

@section('content')
    <h4 class="page-title d-none mr-2">Planning des campagnes</h4>
    <div class="row" id="container-calendar" data-day="{{ $day }}" data-link="{{ route('planning-events') }}">
        <div  class="col-12">
            <ul id="search" class="list-inline" id="list-channels">
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
                    <span class="d-inline-block mr-4 service-canaux real-service" style="cursor:pointer;" data-service="canauxdigitaux" data-show="1"><i class="fa fa-window-minimize" style="color:#00c292;"></i>Canaux Digitaux</span>
                    <span class="d-inline-block mr-4 service-canaux real-service" style="cursor:pointer;" data-service="crm" data-show="1"><i class="fa fa-window-minimize" style="color:#ab8ce4;"></i>CRM</span>
                    <span class="d-inline-block mr-4 service-canaux real-service" style="cursor:pointer;" data-service="communication" data-show="1"><i class="fa fa-window-minimize" style="color:#03a9f3;"></i>Communication</span>
                    <span class="d-inline-block service-canaux real-service" style="cursor:pointer;" data-service="animation" data-show="1"><i class="fa fa-window-minimize" style="color:#ffb463;"></i>Animation commerciale</span>
                </div>
                <span class="d-inline-block service-canaux mt-3" style="cursor:pointer;" data-service="all" data-show="1">
                        <button class="btn btn-info">TOUT AFFICHER / MASQUER</button>
                    </span>
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