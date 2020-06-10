<tr id="channel-{{$channel->pivot->uniqid}}" class="allready-here">
    <td class="channel">
        <div class="canaux form-group mb-0">
            <!--{!! Form::select('channel['.$channel->pivot->uniqid.'][channel_id]',$channels , $channel->id, ['class' => 'form-control select2 select2-ajax']) !!}-->
            <div class="badge badge-outline-dark badge-pill">{{ $channel->name }}</div>
            {!! Form::hidden('channel['.$channel->pivot->uniqid.'][channel_id]',$channel->id) !!}
        </div>
    </td>
    <td class="period">
        <div class="input-group mb-1">
            <label for="name" class="mb-0 pt-1">Du</label>
            {!! Form::text( 'channel['.$channel->pivot->uniqid.'][begin]' , $channel->pivot->begin , array( 'class' => 'form-control date-not-null datepicker duplicatable bg-light text-center p-1' , 'data-name' => 'begin', 'placeholder' => '--/--/--' ) ) !!}
        </div>
        <div class="input-group">
            <label for="name" class="mb-0 pt-1">au</label>
            {!! Form::text( 'channel['.$channel->pivot->uniqid.'][end]' , $channel->pivot->end , array( 'class' => 'form-control date-not-null datepicker duplicatable bg-light text-center p-1' , 'data-name' => 'end', 'placeholder' => '--/--/--' ) ) !!}
        </div>
    </td>
    <td>
        <div class="form-group mb-0">
            {!! Form::textarea( 'channel['.$channel->pivot->uniqid.'][comment]' , $channel->pivot->comment , array( 'class' => 'form-control duplicatable bg-light comment-channel' , 'data-name' => 'comment', 'rows' => '2' ) ) !!}

            <div class="time-limit text-muted" data-delay="{{$channel->delay}}" style="display: none;">
                Éléments à fournir avant le : <span class="date-limit"></span>
            </div>
        </div>
    </td>
    <td>
        {!! Form::select('channel['.$channel->pivot->uniqid.'][user_id]',$users_channels , $channel->pivot->user_id, ['class' => 'select2 form-control']) !!}
    </td>
    <td class="in">
        @if (!empty($channel->Indicators))

            @forelse ($channel->Indicators as $indicator)
                @if ( true )
                    @if (isset($campaignChannelIndicator[$channel->pivot->uniqid][$indicator->id][0]))
                        <?php $cci = $campaignChannelIndicator[$channel->pivot->uniqid][$indicator->id][0] ?>
                        @include('campaigns.campaignchannelindicators')
                    @endif
                @endif

            @empty
                aucun indicateur

            @endforelse


        @endif
    </td>
    <td>
        <div class="btn-group" role="group">
            <a href="javascript:;" class="btn btn-outline-secondary icon-btn ajax-duplicate-campaignchannel" title="Dupliquer ce canal" data-msg="Voulez-vous vraiment dupliquer ce canal ?" data-link="{{route('duplicate-channel' , array('id' => $campaign->id , 'uniqid' => $channel->pivot->uniqid))}}" data-param="{{$channel->pivot->uniqid}}">
                <i class="mdi mdi-content-copy"></i>
            </a>
            <a href="javascript:;" onclick="showSwal('warning-message-and-cancel')" class="btn btn-outline-secondary icon-btn ajax-del" title="Supprimer ce canal" data-msg="Voulez-vous vraiment supprimer ce canal ?" data-link="{{route('unlink-channel' , array('id' => $campaign->id , 'uniqid' => $channel->pivot->uniqid))}}">
                <i class="mdi mdi-delete"></i>
            </a>
         </div>
    </td>
</tr>

