<tr class="">
    <td class="text-left">
        <div class="toggle-radio">
            <input id="cmm1-{{$waiting->id}}" camp="{{$waiting->id}}" name="cmm[{{$waiting->id}}]" class="btn-chck-oui btn-chck" @if($waiting->cmm_display != '0000-00-00') checked="checked" @endif type="radio" value="1">
            <input id="cmm0-{{$waiting->id}}" camp="{{$waiting->id}}" @if($waiting->cmm_display == '0000-00-00') checked="checked" @endif class="btn-chck-non btn-chck" name="cmm[{{$waiting->id}}]" type="radio" value="0">
            <div class="switch">
                <label for="cmm1-{{$waiting->id}}" class="label-chck-oui">Oui</label>
                <label for="cmm0-{{$waiting->id}}" class="label-chck-non">Non</label>
                <span></span>
            </div>
        </div>
    </td>
    <td class="text-left" data-href='{{action('CampaignController@show' , $waiting)}}'>
        {{ $waiting->name }}
    </td>
    <td title="">
        {{ $waiting->period }}
    </td>
    <td>
        {{ $waiting->User->firstnameInitial }}
    </td>
</tr>