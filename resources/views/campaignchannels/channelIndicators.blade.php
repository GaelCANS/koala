<ul class="list-inline">
    <li class="list-inline-item">
        {{$campaignChannelIndicator->Indicator->name}}
        {!! Form::hidden( 'indicator['.$campaignChannelIndicator->uniqid.'][uniqid]' , $campaignChannelIndicator->uniqid , array( 'class' => 'form-control' ) ) !!}
        {!! Form::hidden( 'indicator['.$campaignChannelIndicator->uniqid.'][campaign_channel_id]' , $channel->id , array( 'class' => 'form-control' ) ) !!}
    </li>
    <li class="list-inline-item">
        <div class="form-group">
            {!! Form::number( 'indicator['.$campaignChannelIndicator->uniqid.'][goal]' , $campaignChannelIndicator->goal , array( 'class' => 'form-control duplicatable-indicator' , 'data-name' => 'goal' , 'data-indicator' => $campaignChannelIndicator->Indicator->id ) ) !!}
        </div>
    </li>
    <li class="list-inline-item">
        <div class="form-group">
            {!! Form::number( 'indicator['.$campaignChannelIndicator->uniqid.'][result]' , $campaignChannelIndicator->result , array( 'class' => 'form-control duplicatable-indicator' , 'data-name' => 'result' , 'data-indicator' => $campaignChannelIndicator->Indicator->id ) ) !!}
        </div>
    </li>
</ul>