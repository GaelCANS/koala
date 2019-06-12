<div class="{{$type}}-graph" data-id="{{$graphName}}" id="id-{{$graphName}}" data-name="{{$indicator}}" style="display: none">
    @foreach($graphDatas as $periode => $graphValue)
        <span data-period="{{$periode}}">{{round($graphValue,2)}}</span>
    @endforeach
</div>