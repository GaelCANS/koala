<div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body pl-3 pr-3 pb-2 text-center">
            <i class="icon-chart menu-icon"></i>
            <h5 class="card-title text-center">{{$quarter}}<sup>@if($quarter == 1) er @else ème @endif</sup> trimestre {{ date('Y') }}</h5>

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-email-open-outline' ,
                    'value'     => $statistics[0]['today'] ,
                    'title'     => $statistics[0]['before'] ,
                    'text'      => $statistics[0]['name'],
                    'percent'   => $statistics[0]['percent']
                )
            )

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-facebook' ,
                    'value'     => $statistics[1]['today'] ,
                    'title'     => $statistics[1]['before'] ,
                    'text'      => $statistics[1]['name'],
                    'percent'   => $statistics[1]['percent']
                )
            )

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-image' ,
                    'value'     => $statistics[2]['today'] ,
                    'title'     => $statistics[2]['before'] ,
                    'text'      => $statistics[2]['name'],
                    'percent'   => $statistics[2]['percent']
                )
            )

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-format-page-break' ,
                    'value'     => $statistics[3]['today'] ,
                    'title'     => $statistics[3]['before'] ,
                    'text'      => $statistics[3]['name'],
                    'percent'   => $statistics[3]['percent']
                )
            )

            <hr class="mb-2">
            @if($best_email !== false)
                <div class="col-lg-12 mt-0 p-0">
                    <div class="owl-carousel owl-theme full-width">
                        <div class="item">
                            <div class="card">
                                <div class="d-flex">
                                    <div class="mt-0 text-center w-100">
                                        <h5 class="card-title text-center mb-0 pt-0 pb-0">L'emailing du mois <i class="mdi mdi-heart icon-sm" style="color:hotpink";></i></h5>
                                        <div class="d-flex align-items-center justify-content-md-center">
                                            <div class="col-md-12 text-center">
                                                <h3 class="mb-0" style="color:hotpink;line-height: 18px;">{{$best_email->value}}%</h3>
                                                <small class="mt-0 text-muted">ouvreurs</small>
                                                <p class="mt-2 mb-0"><a href="{{action('CampaignController@show' , $best_email->campaign)}}"> <b>{{$best_email->name}}</b></a><br>
                                                    <small class="text-muted">envoyé le {{$best_email->date}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="d-flex">
                                    <div class="mt-0 text-center w-100">
                                        <h5 class="card-title text-center mb-0 pt-0 pb-0">Le post du mois <i class="mdi mdi-facebook-box icon-sm text-facebook" ></i></h5>
                                        <div class="d-flex align-items-center justify-content-md-center">
                                            <div class="col-md-12 text-center">
                                                <h3 class="mb-0 text-facebook" style="line-height: 18px;">{{$best_email->value}}</h3>
                                                <small class="mt-0 text-muted ">likes</small>
                                                <p class="mt-2 mb-0"><a href="{{action('CampaignController@show' , $best_email->campaign)}}"> <b>{{$best_email->name}}</b></a><br>
                                                    <small class="text-muted">posté le {{$best_email->date}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="d-flex">
                                    <div class="mt-0 text-center w-100">
                                        <h5 class="card-title text-center mb-0 pt-0 pb-0">Le bannière du mois <i class="mdi mdi-star icon-sm" style="color:#ffde3b" ></i></h5>
                                        <div class="d-flex align-items-center justify-content-md-center">
                                            <div class="col-md-12 text-center">
                                                <h3 class="mb-0 text-facebook" style="line-height: 18px;color:#ffde3b;">{{$best_email->value}}</h3>
                                                <small class="mt-0 text-muted ">clics</small>
                                                <p class="mt-2 mb-0"><a href="{{action('CampaignController@show' , $best_email->campaign)}}"> <b>{{$best_email->name}}</b></a><br>
                                                    <small class="text-muted">publié le {{$best_email->date}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endif



        </div>
    </div>


</div>
