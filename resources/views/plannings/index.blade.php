@extends('backoff.app')

@section('content')

    <div class="row" id="container-calendar" data-day="{{ $day }}" data-link="{{ route('planning-events') }}">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body">
                    <h4 class="card-title">Fullcalendar</h4>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

@endsection