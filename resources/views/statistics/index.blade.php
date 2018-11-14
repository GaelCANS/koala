@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>







    <div class="row">
            <div class="col-3 grid-margin stretch-card">
                <div class="card p-3">
                    <div class="align-items-center justify-content-md-center text-center">
                        <div class="badge badge-outline-dark badge-pill">Emailing</div>
                        <div class="col-12">
                            <div id="gg8" class="gauge" data-value="25">
                                <span class="indicator-subtitle text-muted">ouvreurs</span>
                            </div>
                            <div id="gg9" class="gauge" data-value="4">
                                <span class="indicator-subtitle text-muted  mt-0 pt-0">cliqueurs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">SMS</div>
                    <div class="col-12">
                        <div id="gg3" class="gauge" data-value="25">
                            <span class="indicator-subtitle text-muted">receveurs</span>
                        </div>
                        <div id="gg4" class="gauge" data-value="4">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">désabonnés</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">eMessage BAM</div>
                    <div class="col-12">
                        <h3 style="line-height:52px;color:#fb9678;">243</h3>
                        <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">Post Facebook</div>
                    <div class="col-12">
                        <div class="d-inline-block mr-3 ml-1">
                            <h3  style="line-height:52px;color:#3c589b;">243</h3>
                            <span class="indicator-subtitle text-muted mt-2">portée</span>
                        </div>
                        <div id="gg5" class="gauge" data-value="74">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">Post Twitter</div>
                    <div class="col-12">
                        <div class="d-inline-block mr-3 ml-1">
                            <h3  style="line-height:52px;color:#00aced;">765</h3>
                            <span class="indicator-subtitle text-muted mt-2">portée</span>
                        </div>
                        <div id="gg6" class="gauge" data-value="28">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">Post LinkedIn</div>
                    <div class="col-12">
                        <div class="d-inline-block mr-3 ml-1">
                            <h3  style="line-height:52px;color:#00aced;">765</h3>
                            <span class="indicator-subtitle text-muted mt-2">portée</span>
                        </div>
                        <div id="gg7" class="gauge" data-value="28">
                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">vitr - ban part</div>
                    <div class="col-12">
                        <h3 style="line-height:52px;color:#fb9678;">243</h3>
                        <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">vitr - bloc promo</div>
                    <div class="col-12">
                        <h3 style="line-height:52px;color:#fb9678;">243</h3>
                        <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 grid-margin stretch-card">
            <div class="card p-3">
                <div class="align-items-center justify-content-md-center text-center">
                    <div class="badge badge-outline-dark badge-pill">bam - têtière</div>
                    <div class="col-12">
                        <h3 style="line-height:52px;color:#fb9678;">243</h3>
                        <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                    </div>
                </div>
            </div>
        </div>




    </div>







@endsection