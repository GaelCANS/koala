<div class="row">
    <div class="col-12 col-xl-2 grid-margin">
        <div class="card">
            <div class="card-body text-center mx-auto">
                <div class="badge badge-outline-dark badge-pill mb-2">{{$stat['channel']->name}}</div>
                <div class="d-flex d-xl-block align-items-center justify-content-md-center text-center" >
                    @foreach($stat['stats'] as $indicator)
                        <div class="indicator-channel">
                            @if($indicator['type'] == 'percent')
                                @include('statistics.percent' , array('indicator' => $indicator, 'channel' => $stat['channel']))
                            @else
                                @include('statistics.increment' , array('indicator' => $indicator, 'channel' => $stat['channel']))
                            @endif
                        </div>
                    @endforeach
                </div>
                <span class="badge badge-outline-info number mt-2 text-uppercase"><a href="#listing-campaigns">{{$stat['campaigns']}} Campagnes</a></span>
            </div>
        </div>
    </div>

    @include('statistics.graph')

</div>