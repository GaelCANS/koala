@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques emailing</h4>




    @include('statistics.search')

    <div class="row">
        <div class="col-12 col-xl-2 grid-margin">
            <div class="card">
                <div class="card-body text-center mx-auto">
                    <div class="badge badge-outline-dark badge-pill mb-2">Emailing</div>
                    <div class="d-flex d-xl-block align-items-center justify-content-md-center text-center" >
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
                    <span class="badge badge-outline-info number mt-2 text-uppercase">19 Campagnes</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-10 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex table-responsive">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-2 grid-margin">
            <div class="card">
                <div class="card-body text-center mx-auto">
                    <div class="badge badge-outline-dark badge-pill mb-2">eMessage bam</div>
                    <div class="d-flex d-xl-block align-items-center justify-content-md-center text-center" >
                        <div class="indicator-channel">
                            <h2 style="color:#fb9678;">243</h2>
                            <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                        </div>
                        <div class="indicator-channel">
                            <div id="gg2" class="gauge" data-value="74">
                                <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                            </div>
                        </div>
                    </div>
                    <span class="badge badge-outline-info number mt-2 text-uppercase">342 Campagnes</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-10 stretch-card grid-margin">

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flexe">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
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
                                        <thead>
                                        <tr>
                                            <th>Noms</th>
                                            <th>Marchés</th>
                                            <th>Périodes</th>
                                            <th colspan="3">Indicateurs</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left">
                                                    Prévoyance Super Parent
                                                </td>
                                                <td class="marches">
                                                        <div class="badge part">PART</div>
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
                                                <td class="marches">
                                                    <div class="badge pro">PRO</div>
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