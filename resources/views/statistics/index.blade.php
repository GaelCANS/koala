@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>




    @include('statistics.search')




    <div class="row">
            <div class="mx-2 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="align-items-center justify-content-md-center text-center">
                        <div class="badge badge-outline-dark badge-pill">Emailing</div>
                        <div class="col-12">
                            <div class="col-6 d-inline">
                                <div id="gg8" class="gauge" data-value="25">
                                    <span class="indicator-subtitle text-muted">ouvreurs</span>
                                </div>
                            </div>
                            <div class="col-6 d-inline">
                                <div id="gg9" class="gauge" data-value="4">
                                    <span class="indicator-subtitle text-muted  mt-0 pt-0">cliqueurs</span>
                                </div>
                            </div>
                            <div class="col-6 d-inline">
                                <div id="gg3" class="gauge" data-value="1">
                                    <span class="indicator-subtitle text-muted  mt-0 pt-0">désabonnés</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>
                    </div>
                </div>
            </div>


        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">eMessage BAM</div>
                    <div class="col-12" style="height:120px;">
                        <div class="col-6 d-inline" >
                            <h3 style="color:#fb9678;">243</h3>
                            <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                        </div>
                    </div>
                    <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>

                </div>
            </div>
        </div>

        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">Post Facebook</div>
                    <div class="col-12" style="height:120px;">
                        <div class="col-6 d-inline">
                            <div class="d-inline-block">
                                <h3  style="color:#3c589b;">243</h3>
                                <span class="indicator-subtitle text-muted mt-2">portée</span>
                            </div>
                        </div>
                        <div class="col-6 d-inline">
                            <div id="gg5" class="gauge" data-value="74">
                                <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>

                </div>
            </div>
        </div>

        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">Post Twitter</div>
                    <div class="col-12" style="height:120px;">
                        <div class="col-6 d-inline">
                            <div class="d-inline-block">
                                <h3  style="color:#00aced;">765</h3>
                                <span class="indicator-subtitle text-muted mt-2">portée</span>
                            </div>
                        </div>
                        <div class="col-6 d-inline">
                            <div id="gg6" class="gauge" data-value="28">
                                <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>

                </div>
            </div>
        </div>
    </div>







@endsection