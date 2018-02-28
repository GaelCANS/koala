<div class="item">
    <div class="card">
        <div class="d-flex">
            <div class="mt-0 text-center w-100">
                <h5 class="card-title text-center mb-0 pt-0 pb-0">{{ $title }} <i class="mdi {{ $icon }} icon-sm" style="color:{{ $color }}";></i></h5>
                <div class="d-flex align-items-center justify-content-md-center">
                    <div class="col-md-12 text-center">
                        <h3 class="mb-0" style="color:{{ $color }};line-height: 18px;">{{ $value }}</h3>
                        <small class="mt-0 text-muted">{{ $unite }}</small>
                        <p class="mt-2 mb-0"><a href="{{action('CampaignController@show' , $objet )}}"> <b>{{$name}}</b></a><br>
                            <small class="text-muted">envoyé le {{$date}}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>