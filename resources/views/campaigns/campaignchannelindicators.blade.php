<ul class="list-inline">
    <li class="list-inline-item">
        {{$indicator->name}}
        {!! Form::hidden( 'indicator['.$cci->uniqid.'][uniqid]' , $cci->uniqid , array( 'class' => 'form-control' ) ) !!}
        {!! Form::hidden( 'indicator['.$cci->uniqid.'][campaign_channel_id]' , $channel->pivot->id , array( 'class' => 'form-control' ) ) !!}
    </li>
    <li class="list-inline-item">
        <div class="form-group">
            {!! Form::number( 'indicator['.$cci->uniqid.'][goal]' , $cci->goal , array( 'class' => 'form-control' ) ) !!}
        </div>
    </li>
    <li class="list-inline-item">
        <div class="form-group">
            {!! Form::number( 'indicator['.$cci->uniqid.'][result]' , $cci->result , array( 'class' => 'form-control' ) ) !!}
        </div>
    </li>
</ul>