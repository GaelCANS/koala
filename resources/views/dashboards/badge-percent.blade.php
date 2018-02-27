<div class="badge badge-pill badge-outline-{{$badge}} text-{{$badge}}" title="@if($title != '') {{$title}} @endif {{$text}}">
    <i class="mdi mdi-arrow-{{$arrow}}"></i>
    @if($percent != '')
        {{ abs($percent) }}%
        @else
        --
    @endif
</div>