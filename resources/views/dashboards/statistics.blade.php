<div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title text-center">{{$quarter}}<sup>@if($quarter == 1) er @else ème @endif</sup> trimestre {{ date('Y') }}</h6>

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
            <h6 class="card-title text-center">L'emailing du mois <i class="mdi mdi-heart icon-sm" style="color:hotpink";></i></h6>
            <div class="d-flex align-items-center justify-content-md-center">
                <div class="text-center">
                    <h3 class="mb-0" style="color:hotpink;line-height: 18px;">39%</h3>
                    <small class="mt-0 text-muted">ouvreurs</small>
                    <p class="mt-2 mb-0"><b>Assemblée générale</b><br>
                        <small class="text-muted">envoyé le 07/01/2018</small></p>

                </div>




            </div>

        </div>
    </div>


</div>
