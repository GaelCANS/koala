<div class="card">
    <div class="card-body pb-0">
        <div class="d-flex table-responsive">
            <h5 class="card-title">Timeline des campagnes</h5>
        </div>
        <div class="row">
            <div class="col-12">

            <div class="row" style="margin-top: 12px">
                <div class="col-md-12">
                    <div id="gantt-camp" style="height: {{$campaigns->count()*55}}px;"></div>
                </div>
            </div>

            </div>
        </div>
    </div>

</div>

@forelse($campaigns as $campaign)
    @if ($campaign->begin != '0000-00-00' && ($campaign->end != '0000-00-00' && $campaign->end != ''))
        <div
                class="timeline-channel"
                data-channel="{{$campaign->name}}"
                data-family="{{$campaign->User->name}}"
                data-begin="{{\Carbon\Carbon::createFromFormat('d/m/y' , $campaign->begin)->format('Y-m-d')}}"
                data-end="{{\Carbon\Carbon::createFromFormat('d/m/y',$campaign->end)->format('Y-m-d')}}"
        >
        </div>
    @endif
@empty
@endforelse