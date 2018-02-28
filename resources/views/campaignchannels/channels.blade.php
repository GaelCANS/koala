<tr id="channel-{{$channel->uniqid}}" class="{{$type}}">
    <td class="channel">
        <div class="canaux form-group mb-0">
            <!--{!! Form::select('channel['.$channel->uniqid.'][channel_id]',$channels , $channel->channel_id, ['class' => 'form-control select2']) !!}-->
            {{ $channel->Channel->name }}
            {!! Form::hidden('channel['.$channel->uniqid.'][channel_id]',$channel->channel_id) !!}
        </div>
    </td>
    <td class="period">
        <div class="input-group mb-1">
            <label for="name" class="mb-0 pt-1">Du</label>
            {!! Form::text( 'channel['.$channel->uniqid.'][begin]' , $channel->begin , array( 'class' => 'form-control date-not-null datepicker to-focus duplicatable bg-light text-center p-1' , 'data-name' => 'begin', 'placeholder' => '--/--/--' ) ) !!}
        </div>
        <div class="input-group">
            <label for="name" class="mb-0 pt-1">au</label>
            {!! Form::text( 'channel['.$channel->uniqid.'][end]' , $channel->end , array( 'class' => 'form-control date-not-null datepicker duplicatable bg-light text-center p-1' , 'data-name' => 'end', 'placeholder' => '--/--/--' ) ) !!}
        </div>
    </td>
    <td>
        <div class="form-group mb-0">
            {!! Form::textarea( 'channel['.$channel->uniqid.'][comment]' , $channel->comment , array( 'class' => 'form-control duplicatable bg-light' , 'data-name' => 'comment', 'rows' => '2' ) ) !!}
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
        <div class="btn-group" role="group">
            <a href="javascript:;" class="btn btn-outline-secondary icon-btn ajax-duplicate-campaignchannel" title="Dupliquer ce canal" data-msg="Voulez-vous vraiment dupliquer ce canal ?" data-link="{{route('duplicate-channel' , array('id' => $campaign->id , 'uniqid' => $channel->uniqid))}}" data-param="{{$channel->uniqid}}">
                <i class="mdi mdi-content-copy"></i>
            </a>
            <a href="javascript:;" class="btn btn-outline-secondary icon-btn ajax-del" title="Supprimer ce canal" data-msg="Voulez-vous vraiment supprimer ce canal ?" data-link="{{route('unlink-channel' , array('id' => $campaign->id , 'uniqid' => $channel->uniqid))}}">
                <i class="mdi mdi-delete"></i>
            </a>
        </div>
    </td>
</tr>
