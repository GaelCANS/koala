<tr id="channel-{{$channel->uniqid}}">
    <td>
        <div class="form-group">
            {!! Form::select('channel['.$channel->uniqid.'][channel_id]',$channels , $channel->channel_id, ['class' => 'form-control select2']) !!}
        </div>
    </td>
    <td>
        <div class="form-group">
            <label for="name">Du</label>
            {!! Form::text( 'channel['.$channel->uniqid.'][begin]' , $channel->begin , array( 'class' => 'form-control date-not-null datepicker to-focus' ) ) !!}
        </div>
        <div class="form-group">
            <label for="name">au</label>
            {!! Form::text( 'channel['.$channel->uniqid.'][end]' , $channel->end , array( 'class' => 'form-control date-not-null datepicker' ) ) !!}
        </div>
    </td>
    <td>
        <div class="form-group">
            <label for="name">Commentaires</label>
            {!! Form::textarea( 'channel['.$channel->uniqid.'][comment]' , $channel->comment , array( 'class' => 'form-control' ) ) !!}
        </div>
    </td>
    <td>
        @if (!empty($channel->campaignChannelIndicators))

            @forelse ($channel->campaignChannelIndicators as $campaignChannelIndicator)
                @include('campaignchannels.channelIndicators')

            @empty
                aucun indicateur

            @endforelse


        @endif
    </td>
    <td>
        <a href="javascript:;" class="btn btn-success ajax-duplicate-campaignchannel" title="Dupliquer ce canal" data-msg="Voulez-vous vraiment dupliquer ce canal ?" data-link="{{route('duplicate-channel' , array('id' => $campaign->id , 'uniqid' => $channel->uniqid))}}" data-param="{{$channel->uniqid}}">
            <i class="fa fa-copy"></i>
        </a>
        <a href="javascript:;" class="btn btn-danger ajax-del" title="Supprimer ce canal" data-msg="Voulez-vous vraiment supprimer ce canal ?" data-link="{{route('unlink-channel' , array('id' => $campaign->id , 'uniqid' => $channel->uniqid))}}">
            <i class="fa fa fa-fw fa-trash"></i>
        </a>
    </td>
</tr>
