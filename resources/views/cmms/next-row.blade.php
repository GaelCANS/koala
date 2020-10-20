@if($campaign)
<tr class="" id="camp-{{ $campaign->id }}" data-href='{{action('CampaignController@show' , $campaign)}}'>
    <td class="text-left">
        {{ $campaign->name }}
    </td>
    <td title="">
        {{ $campaign->period }}
    </td>
    <td>
        @if($campaign->User)
        {{ $campaign->User->firstnameInitial }}
        @endif
    </td>
</tr>
@endif