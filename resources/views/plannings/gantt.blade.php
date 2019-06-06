<div class="row coucou" style="margin-top: 12px">
    <div class="col-md-12">
        <div
                id="gantt-camp" data-begin="{{!empty($request->begin) ? $request->begin : ''}}" data-end="{{!empty($request->end) ? $request->end : ''}}"
                data-min="{{\Carbon\Carbon::createFromFormat('d/m/Y',$request->begin)->format('Y-m-d')}}"
                data-max="{{\Carbon\Carbon::createFromFormat('d/m/Y',$request->end)->format('Y-m-d')}}"
        >
        </div>
    </div>
</div>


@forelse($campaigns as $campaignChannel)
    @if ($campaignChannel->begin != '0000-00-00' && $campaignChannel->end != '0000-00-00' && isset($campaignChannel->Campaign))
        <div
                class="timeline-channel"
                data-channel="{{$campaignChannel->Campaign->name}}"
                data-family="{{$campaignChannel->Campaign->name}}"
                data-begin="{{$campaignChannel->begin}}"
                data-end="{{$campaignChannel->end}}"
        >
        </div>
    @endif
@empty

@endforelse