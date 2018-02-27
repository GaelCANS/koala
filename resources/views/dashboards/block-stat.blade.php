<div class="d-flex align-items-center justify-content-md-center">
    <i class="mdi {{$icon}} icon-lg text-secondary"></i>
    <div class="col-md-6 ml-2 mr-2 text-center">
        <h3 class="mb-0" style="line-height: 19px;">{{$value}}</h3>
        <small class="text-muted">{{$text}}</small>
    </div>
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