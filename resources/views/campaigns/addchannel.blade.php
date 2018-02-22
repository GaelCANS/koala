<tfoot id="add-channel" data-id="{{$campaign->id}}" data-link="{{route('add-channel' , array( 'id' => $campaign->id , 'selected' => '--VALUE--' ))}}">
<tr>
    <td>
        <div class="form-group">
            {!! Form::select('channel['.$channel->pivot->uniqid.'][channel_id]',$channels , null, ['class' => 'form-control select2']) !!}
        </div>
    </td>
    <td>
        <div>Du --/--/--</div>
        <div>au --/--/--</div>
    </td>
    <td>

    </td>
    <td>

    </td>
    <td>

    </td>
</tr>
</tfoot>