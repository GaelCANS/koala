<div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body pl-3 pr-3 pb-2 text-center">
            <i class="icon-chart menu-icon"></i>
            <h5 class="card-title text-center">{{$quarter}}<sup>@if($quarter == 1)er @elseème @endif</sup> trimestre {{ date('Y') }}</h5>

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-email-open-outline' ,
                    'color' => 'hotpink',
                    'value'     => $statistics[0]['today'] ,
                    'title'     => $statistics[0]['before'] ,
                    'channel'   => $statistics[0]['channel'] ,
                    'text'      => $statistics[0]['name'],
                    'percent'   => $statistics[0]['percent']
                )
            )

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-facebook' ,
                    'color' => '#3c589b',
                    'value'     => $statistics[1]['today'] ,
                    'title'     => $statistics[1]['before'] ,
                    'channel'   => $statistics[1]['channel'] ,
                    'text'      => $statistics[1]['name'],
                    'percent'   => $statistics[1]['percent']
                )
            )

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-image' ,
                    'color' => '#fb9678',
                    'value'     => $statistics[2]['today'] ,
                    'title'     => $statistics[2]['before'] ,
                    'channel'   => $statistics[2]['channel'] ,
                    'text'      => $statistics[2]['name'],
                    'percent'   => $statistics[2]['percent']
                )
            )

            @include(
                'dashboards.block-stat' ,
                array(
                    'icon'      => 'mdi-cellphone-iphone' ,
                    'color' => '#ab8ce4',
                    'value'     => $statistics[3]['today'] ,
                    'title'     => $statistics[3]['before'] ,
                    'channel'   => $statistics[3]['channel'] ,
                    'text'      => $statistics[3]['name'],
                    'percent'   => $statistics[3]['percent']
                )
            )

            <hr class="mb-2">
            @if($best_email !== false || $best_fb !== false || $best_bann !== false)
                <div class="col-lg-12 mt-0 p-0">
                    <div class="owl-carousel owl-theme full-width">
                        @if($best_email !== false)
                            @include(
                                'dashboards.best' ,
                                array(
                                    'title' => "L'email du mois",
                                    'icon'  => "mdi-email-open-outline",
                                    'color' => 'hotpink',
                                    'value' => $best_email->value." %",
                                    'unite' => 'ouvreurs',
                                    'objet' => $best_email->campaign,
                                    'name'  => $best_email->name,
                                    'action' => 'envoyé',
                                    'date'  => $best_email->date
                                )
                            )
                        @endif
                        @if($best_fb !== false)
                            @include(
                                'dashboards.best' ,
                                array(
                                    'title' => "Le post du mois",
                                    'icon'  => "mdi-facebook-box",
                                    'color' => '#3c589b',
                                    'value' => $best_fb->value,
                                    'unite' => 'portée',
                                    'objet' => $best_fb->campaign,
                                    'name'  => $best_fb->name,
                                    'action' => 'publié',
                                    'date'  => $best_fb->date
                                )
                            )
                        @endif
                        @if($best_bann !== false)
                            @include(
                                'dashboards.best' ,
                                array(
                                    'title' => "La bannière du mois",
                                    'icon'  => "mdi-image",
                                    'color' => '#fb9678',
                                    'value' => $best_bann->value,
                                    'unite' => 'clics',
                                    'objet' => $best_bann->campaign,
                                    'name'  => $best_bann->name,
                                    'action' => 'publiée',
                                    'date'  => $best_bann->date
                                )
                            )
                        @endif
                    </div>
                </div>
            @endif



        </div>
    </div>


</div>
