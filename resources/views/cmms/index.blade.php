@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Comité Marketing Multicanal</h4>
    <div id="cmm" class="row">

        <div class="col-md-5 grid-margin ">

            @include('cmms.next')

            @include('cmms.recap')

        </div>

        <div class="col-md-7 grid-margin ">
            @include('cmms.waiting')
        </div>


    </div>

    @include('cmms.modal')

@endsection