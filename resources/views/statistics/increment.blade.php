<div class="indicator-channel">
    <h2 style="color:#fb9678;" class="{{$channel->class_name}}">{{round($indicator['average'])}}</h2>
    <span class="indicator-subtitle text-muted mt-2">@if ($indicator['id'] != \App\Parameter::getParameter('best_banniere' , 'dashboard') ) {{$indicator['indicator']}} @else Clics/jour @endif</span>
</div>