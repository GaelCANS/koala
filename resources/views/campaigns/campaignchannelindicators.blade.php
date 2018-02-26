<ul class="list-inline d-inline-flex mb-1 indicator">
    <li class="list-inline-item ">
        <label class="label-indicator">{{$indicator->name}}</label>
        {!! Form::hidden( 'indicator['.$cci->uniqid.'][uniqid]' , $cci->uniqid , array( 'class' => 'form-control bg-light text-center mb-0' ) ) !!}
        {!! Form::hidden( 'indicator['.$cci->uniqid.'][campaign_channel_id]' , $channel->pivot->id , array( 'class' => 'form-control bg-light text-center mb-0' ) ) !!}</li>
        </div>
    <li class="list-inline-item">
        <div class="form-group mb-0">
            {!! Form::number( 'indicator['.$cci->uniqid.'][goal]' , $cci->goal , array( 'class' => 'form-control duplicatable bg-light  text-muted mb-0 p-1' , 'data-name' => 'goal' ) ) !!}
        </div>
    </li>
    <li class="list-inline-item ">
        <div class="form-group mb-0">
            {!! Form::number( 'indicator['.$cci->uniqid.'][result]' , $cci->result , array( 'class' => 'form-control duplicatable bg-light  mb-0 p-1' , 'data-name' => 'result' ) ) !!}
        </div>
    </li>
</ul>