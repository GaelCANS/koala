@extends('backoff.app')

@section('content')

    <h4 class="page-title d-none">Statistiques</h4>

    <div  class="row">

        <div class="col-md-6 grid-margin ">
            <div class="card text-center">
                <div class="card-body ">
                    <div class="d-flex table-responsive ">
                        <h5 class="card-title w-100 text-center pl-0">Taux moyen</h5>
                    </div>
                    <div class="row">
                        <div class="col-4" style="border-right:1px solid #eee;">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        <h6 class="mb-1">Emailing</h6>
                                            <div id="gg1" class="gauge" data-value="25">
                                                <span class="indicator-subtitle text-muted">ouvreurs</span>
                                            </div>
                                            <div id="gg2" class="gauge" data-value="4">
                                                <span class="indicator-subtitle text-muted  mt-0 pt-0">cliqueurs</span>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4" style="border-right:1px solid #eee;">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        <h6 class="mb-1">SMS</h6>
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
                        <div class="col-4">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        <h6 class="mb-3">Bannière PART</h6>
                                        <h3 style="line-height:52px;color:#fb9678;">243</h3>
                                        <span class="indicator-subtitle text-muted mt-2">clics/jour</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row " style="border-top:1px solid #eee;">
                    <div class="col-4" style="border-right:1px solid #eee;">
                        <div class="wrapper py-2">
                            <div class="d-flex">
                                <div class="table-responsive">
                                    <h6 class="mb-1">Post facebook</h6>
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
                        <div class="col-4" style="border-right:1px solid #eee;">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        <h6 class="mb-1">Post twitter</h6>
                                        <div class="d-inline-block mr-3 ml-1">
                                            <h3  style="line-height:52px;color:#3c589b;">765</h3>
                                            <span class="indicator-subtitle text-muted mt-2">portée</span>
                                        </div>
                                        <div id="gg6" class="gauge" data-value="28">
                                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        <h6 class="mb-1">Post linkedin</h6>
                                        <div class="d-inline-block mr-3 ml-1">
                                            <h3  style="line-height:52px;color:#3c589b;">1341</h3>
                                            <span class="indicator-subtitle text-muted mt-2">portée</span>
                                        </div>
                                        <div id="gg7" class="gauge" data-value="42">
                                            <span class="indicator-subtitle text-muted  mt-0 pt-0">engagements</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



        </div>

        <div class="col-md-6 grid-margin ">

            <div class="card  text-center">
                <div class="card-body pb-0">
                    <div class="d-flex table-responsive ">
                        <h5 class="card-title w-100 text-center pl-0">Les Top !</h5>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div  class="row">
        <div class="col-md-12 grid-margin ">
            <div class="card mb-4 text-center">
                <div class="card-body pb-0">
                    <div class="d-flex table-responsive ">
                        <h5 class="card-title ">Derniers résultats</h5>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wrapper py-2">
                                <div class="d-flex">
                                    <div class="table-responsive">
                                        1
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection