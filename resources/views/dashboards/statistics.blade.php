<div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
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

            <hr>
            @if($best_email !== false)
            <h5 class="card-title text-center">L'emailing du mois <i class="mdi mdi-heart icon-sm" style="color:hotpink";></i></h5>
            <div class="d-flex align-items-center justify-content-md-center">
                <div class="text-center">
                    <h3 class="mb-0" style="color:hotpink;line-height: 18px;">{{$best_email->value}}%</h3>
                    <small class="mt-0 text-muted">ouvreurs</small>
                    <p class="mt-2 mb-0"><a href="{{action('CampaignController@show' , $best_email->campaign)}}"> <b>{{$best_email->name}}</b></a><br>
                        <small class="text-muted">envoyé le {{$best_email->date}}</small></p>
                </div>
            </div>
            @endif

        </div>
    </div>


</div>
