<div class="badge badge-pill badge-outline-{{$badge}} text-{{$badge}}" title="T-1 : @if($title != '') {{$title}} @endif {{$text}}"  data-toggle="tooltip" data-placement="bottom" >
    <i class="mdi mdi-arrow-{{$arrow}}"></i>
    @if($percent != '')
        {{ abs($percent) }}%
        @else
        --
    @endif
</div>