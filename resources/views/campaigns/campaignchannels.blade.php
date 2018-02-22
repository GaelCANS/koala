<tr id="channel-{{$channel->pivot->uniqid}}">
    <td>
        <div class="form-group">
            {!! Form::select('channel['.$channel->pivot->uniqid.'][channel_id]',$channels , $channel->id, ['class' => 'form-control select2 select2-ajax']) !!}
        </div>
    </td>
    <td>
        <div class="form-group">
            <label for="name">Du</label>
            {!! Form::text( 'channel['.$channel->pivot->uniqid.'][begin]' , $channel->pivot->begin , array( 'class' => 'form-control date-not-null datepicker duplicatable' , 'data-name' => 'begin' ) ) !!}
        </div>
        <div class="form-group">
            <label for="name">au</label>
            {!! Form::text( 'channel['.$channel->pivot->uniqid.'][end]' , $channel->pivot->end , array( 'class' => 'form-control date-not-null datepicker duplicatable' , 'data-name' => 'end' ) ) !!}
        </div>
    </td>
    <td>
        <div class="form-group">
            <label for="name">Objectif(s) de la campagne</label>
            {!! Form::textarea( 'channel['.$channel->pivot->uniqid.'][comment]' , $channel->pivot->comment , array( 'class' => 'form-control duplicatable' , 'data-name' => 'comment' ) ) !!}
        </div>
    </td>
    <td>
        @if (!empty($channel->Indicators))

            @forelse ($channel->Indicators as $indicator)
                <?php $cci = $campaignChannelIndicator[$channel->pivot->uniqid][$indicator->id][0] ?>
                @include('campaigns.campaignchannelindicators')

            @empty
                aucun indicateur

            @endforelse


        @endif
    </td>
    <td>
        <a href="javascript:;" class="btn btn-success ajax-duplicate-campaignchannel" title="Dupliquer ce canal" data-msg="Voulez-vous vraiment dupliquer ce canal ?" data-link="{{route('duplicate-channel' , array('id' => $campaign->id , 'uniqid' => $channel->pivot->uniqid))}}" data-param="{{$channel->pivot->uniqid}}">
            <i class="fa fa-copy"></i>
        </a>
        <a href="javascript:;" class="btn btn-danger ajax-del" title="Supprimer ce canal" data-msg="Voulez-vous vraiment supprimer ce canal ?" data-link="{{route('unlink-channel' , array('id' => $campaign->id , 'uniqid' => $channel->pivot->uniqid))}}">
            <i class="fa fa fa-fw fa-trash"></i>
        </a>
    </td>
</tr>