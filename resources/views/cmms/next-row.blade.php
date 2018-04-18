<tr class="" id="camp-{{ $campaign->id }}" data-href='{{action('CampaignController@show' , $campaign)}}'>
    <td class="text-left">
        {{ $campaign->name }}
    </td>
    <td title="">
        {{ $campaign->period }}
    </td>
    <td>
        {{ $campaign->User->firstnameInitial }}
    </td>
</tr>