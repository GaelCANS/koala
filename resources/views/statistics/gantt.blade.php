<div class="row coucou" style="margin-top: 12px">
    <div class="col-md-12">
        <div
                id="gantt-camp" data-begin="{{!empty($data['begin']) ? $data['begin'] : ''}}" data-end="{{!empty($data['end']) ? $data['end'] : ''}}"
                data-min="{{\Carbon\Carbon::createFromFormat('d/m/Y',$data['begin'])->format('Y-m-d')}}"
                data-max="{{\Carbon\Carbon::createFromFormat('d/m/Y',$data['end'])->format('Y-m-d')}}"
                style="width: 100%;"
                data-load="false"
        >
        </div>
    </div>
</div>

@forelse($printedChannels as $printedChannel)
    <div
            class="timeline-channel"
            data-channel="{{$printedChannel->Campaign->name}}"
            data-family="{{$printedChannel->Campaign->name}}"
            data-begin="{{$printedChannel->begin}}"
            data-end="{{$printedChannel->end}}"
    >
    </div>
@empty

@endforelse