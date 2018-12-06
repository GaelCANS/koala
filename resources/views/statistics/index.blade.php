@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>




    @include('statistics.search')




    <div class="row dashboard-stat">

        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="badge badge-outline-dark badge-pill">Emailing</div>
                <div class="d-flex align-items-center justify-content-md-center text-center" style="height:120px;">
                    <div class="indicator-channel">
                        <div id="gg8" class="gauge" data-value="25">
                            <span class="indicator-subtitle text-muted">ouvreurs</span>
                        </div>
                    </div>
                    <div class="indicator-channel">
                        <div id="gg9" class="gauge" data-value="4">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">cliqueurs</span>
                        </div>
                    </div>
                    <div class="indicator-channel">
                        <div id="gg3" class="gauge" data-value="1">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">désabonnés</span>
                        </div>
                    </div>
                </div>
                <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>
            </div>
        </div>


        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="badge badge-outline-dark badge-pill">vitr - ban part</div>
                    <div class="d-flex align-items-center justify-content-md-center text-center" style="height:120px;">
                        <div class="indicator-channel">
                            <h3 style="color:#fb9678;">243</h3>
                            <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                        </div>
                    </div>
                    <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>
            </div>
        </div>

        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="badge badge-outline-dark badge-pill">eMessage BAM</div>
                <div class="d-flex align-items-center justify-content-md-center text-center" style="height:120px;">
                    <div class="indicator-channel">
                        <h3 style="color:#fb9678;">243</h3>
                        <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                    </div>
                    <div class="indicator-channel">
                        <div id="gg2" class="gauge" data-value="74">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                        </div>
                    </div>
                </div>
                <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>
            </div>
        </div>

        <div class="mx-2 grid-margin stretch-card">
            <div class="card p-3">
                <div class="badge badge-outline-dark badge-pill">Post Facebook</div>
                <div class="d-flex align-items-center justify-content-md-center text-center" style="height:120px;">
                    <div class="indicator-channel">
                        <h3  style="color:#3c589b;">243</h3>
                        <span class="indicator-subtitle text-muted mt-2">portée</span>
                    </div>
                    <div class="indicator-channel">
                        <div id="gg5" class="gauge" data-value="74">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                        </div>
                    </div>
                </div>
                <a href="{{route('channel-stat')}}" class="btn btn-light btn-xs mt-3">Voir en détail</a>
            </div>
        </div>




    </div>







@endsection