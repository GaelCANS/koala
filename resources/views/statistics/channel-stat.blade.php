@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques emailing</h4>




    @include('statistics.search')

    <div class="row">
        <div class="col-2 grid-margin">
            <div class="card">
                <div class="card-body text-center mx-auto">
                    <div class="badge badge-outline-dark badge-pill mb-2">Emailing</div>
                    <div class="d-block align-items-center justify-content-md-center text-center" >
                        <div class="indicator-channel">
                            <h3 style="color:#fb9678;">243</h3>
                            <span class="indicator-subtitle text-muted mt-2 pb-3">clics/jour</span>
                        </div>
                        <div class="indicator-channel">
                            <h3 style="color:#fb9678;">243</h3>
                            <span class="indicator-subtitle text-muted mt-2 pb-3">clics/jour</span>
                        </div>
                        <div class="indicator-channel">
                            <div id="gg9" class="gauge" data-value="4">
                                <span class="indicator-subtitle text-muted  mt-0 pt-0">cliqueurs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex table-responsive">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex table-responsive">
                    <h5 class="card-title">Campagnes concernés</h5>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="wrapper py-2">
                            <div class="d-flex">
                                <div class="table-responsive">
                                    <table class="table table-hover ajax-action">
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                    Prévoyance Super Parent
                                                </td>
                                                <td title="">
                                                    24/02/2018 au 25/02/2018
                                                </td>

                                                <td>
                                                    <div class="text-center">
                                                        <h4 class="mb-0 font-weight-bold">
                                                            34%
                                                        </h4>
                                                        <small>Ouvreurs</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h4 class="mb-0 font-weight-bold">
                                                            12%
                                                        </h4>
                                                        <small>cliqueurs</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h4 class="mb-0 font-weight-bold">
                                                            1%
                                                        </h4>
                                                        <small>désabonnés</small>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left">
                                                    EKO
                                                </td>
                                                <td title="">
                                                    21/12/2018 au 03/02/2019
                                                </td>

                                                <td>
                                                    <div class="text-center">
                                                        <h4 class="mb-0 font-weight-bold">
                                                            32%
                                                        </h4>
                                                        <small>Ouvreurs</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h4 class="mb-0 font-weight-bold">
                                                            8%
                                                        </h4>
                                                        <small>cliqueurs</small>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <h4 class="mb-0 font-weight-bold">
                                                            4%
                                                        </h4>
                                                        <small>désabonnés</small>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection