<ul class="list-inline d-inline-flex mb-1 indicator">
    <li class="list-inline-item">
        <label class="label-indicator">{{$campaignChannelIndicator->Indicator->name}}</label>
        {!! Form::hidden( 'indicator['.$campaignChannelIndicator->uniqid.'][uniqid]' , $campaignChannelIndicator->uniqid , array( 'class' => 'form-control bg-light text-center mb-0' ) ) !!}
        {!! Form::hidden( 'indicator['.$campaignChannelIndicator->uniqid.'][campaign_channel_id]' , $channel->id , array( 'class' => 'form-control bg-light text-center mb-0' ) ) !!}
    </li>
    <!--<li class="list-inline-item">
        <div class="form-group mb-0">
            {!! Form::number( 'indicator['.$campaignChannelIndicator->uniqid.'][goal]' , $campaignChannelIndicator->goal , array( 'class' => 'form-control duplicatable-indicator bg-light text-muted mb-0 p-1' , 'data-name' => 'goal' , 'data-indicator' => $campaignChannelIndicator->Indicator->id ) ) !!}
        </div>
    </li>-->
    <li class="list-inline-item">
        <div class="form-group mb-0">
            {!! Form::number( 'indicator['.$campaignChannelIndicator->uniqid.'][result]' , $campaignChannelIndicator->result , array( 'class' => 'form-control duplicatable-indicator bg-light mb-0 p-1' , 'data-name' => 'result' , 'data-indicator' => $campaignChannelIndicator->Indicator->id, 'step' => 'any' , 'data-specific' => $campaignChannelIndicator->Indicator->speClass , 'data-cci' => $channel->uniqid ) ) !!}
        </div>
    </li>
</ul>