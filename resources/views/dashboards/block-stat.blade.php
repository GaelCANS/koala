<div class="d-flex align-items-center justify-content-md-center">
    <div class="col-md-3">
        <i class="mdi {{$icon}} icon-lg" title="{{ $channel }}" data-toggle="tooltip" data-placement="left" style="opacity: .15;"></i>
    </div>
    <div class="col-md-6 text-center mr-0 ml-0">
        <h3 class="mb-0" style="line-height:19px;color:{{$color}};">{{$value}}</h3>
        <small class="text-muted text-lowercase">{{$text}}</small>
    </div>
    <div class="col-md-3 text-center percent ml-0 pl-0">
        @include(
            'dashboards.badge-percent' ,
            array(
                'badge'     => $percent > 0 ? 'success' : ($percent < 0 ? 'danger' : 'info') ,
                'arrow'     => $percent > 0 ? 'up' : ($percent < 0 ? 'down' : 'right') ,
                'percent'   => $percent,
                'title'     => $title,
                'text'      => $text
            )
        )
    </div>
</div>