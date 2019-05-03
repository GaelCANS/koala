@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none mt-3">Glossaire</h4>

    <div class="row">

        <div class="col-lg-5">
            <div class="card ">

            </div>
            <div class="card grid-margin">
                <div class="card-body text-center">
                    <div id="lexique">

                        <select name="lst-lexique"  class="select2" id="lst-lexique">
                            @forelse($channels as $channel)
                                <option class="badge " value="{{ $channel->id }}" data-id="{{ $channel == null?'':$channel->id}}" @if ($channel != null) data-url="{{action("LexiqueController@detailLexique" , $channel)}}" @endif>{{ $channel->name }}</option>

                            @empty
                            @endforelse

                        </select>
                    </div>
                    <div id="detail-channel">
                        @include('lexique.detail-lexique', array('channel' => $channels->first()))
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                   <img src="{{ asset('/images/lexique/vitr-banpart.png') }}" width="100%">

                </div>
            </div>
        </div>
    </div>

@endsection

