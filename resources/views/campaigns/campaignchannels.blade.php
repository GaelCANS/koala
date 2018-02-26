<tr id="channel-{{$channel->pivot->uniqid}}">
    <td>
        <div class="canaux form-group mb-0">
            {!! Form::select('channel['.$channel->pivot->uniqid.'][channel_id]',$channels , $channel->id, ['class' => 'form-control select2 select2-ajax']) !!}
        </div>
    </td>
    <td>
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
            {!! Form::textarea( 'channel['.$channel->pivot->uniqid.'][comment]' , $channel->pivot->comment , array( 'class' => 'form-control duplicatable bg-light' , 'data-name' => 'comment', 'rows' => '2' ) ) !!}
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
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="javascript:;" class="btn btn-outline-secondary icon-btn ajax-duplicate-campaignchannel" title="Dupliquer ce canal" data-msg="Voulez-vous vraiment dupliquer ce canal ?" data-link="{{route('duplicate-channel' , array('id' => $campaign->id , 'uniqid' => $channel->pivot->uniqid))}}" data-param="{{$channel->pivot->uniqid}}">
                <i class="mdi mdi-content-copy"></i>
            </a>
            <a href="javascript:;" class="btn btn-outline-secondary icon-btn ajax-del" title="Supprimer ce canal" data-msg="Voulez-vous vraiment supprimer ce canal ?" data-link="{{route('unlink-channel' , array('id' => $campaign->id , 'uniqid' => $channel->pivot->uniqid))}}">
                <i class="mdi mdi-delete"></i>
            </a>
         </div>
    </td>
</tr>

