<div id="gauge-{{$indicator['id']}}" class="gauge" data-color="{{$channel->class_name}}" data-value="{{round($indicator['average'])}}">
    <span class="indicator-subtitle text-muted">{{$indicator['indicator']}}</span>
</div>