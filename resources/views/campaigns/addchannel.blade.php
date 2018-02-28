<tfoot id="add-channel" data-id="{{$campaign->id}}" data-link="{{route('add-channel' , array( 'id' => $campaign->id , 'selected' => '--VALUE--' ))}}">
<tr>
    <td>
        <div class="canaux form-group mb-0">
            {!! Form::select('add-new-channel',$channels , null, ['class' => 'form-control select2']) !!}
        </div>
    </td>
    <td class="period">
        <div class="input-group mb-1">
            <label for="name" class="mb-0 pt-1">Du</label>
            <input class="form-control date-not-null datepicker duplicatable bg-light text-center p-1" placeholder="--/--/--" disabled>

        </div>
        <div class="input-group">
            <label for="name" class="mb-0 pt-1">au</label>
            <input class="form-control date-not-null datepicker duplicatable bg-light text-center p-1" placeholder="--/--/--" disabled>
        </div>
    </td>
    <td>

    </td>
    <td>

    </td>
    <td>

    </td>
</tr>
</tfoot>