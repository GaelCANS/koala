<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignChannel;
use App\CampaignChannelIndicator;
use App\Channel;
use Illuminate\Http\Request;

use App\Http\Requests;

class CampaignchannelController extends Controller
{
    
    public function duplicate($id, $channelUniqid)
    {
        $campaign           = Campaign::findOrFail($id);
        $campaignChannel    = CampaignChannel::where('uniqid' , $channelUniqid)->where('campaign_id' , $campaign->id)->first();
        $newCampaignChannel = CampaignChannel::create(
            array(
                'campaign_id'   => $campaignChannel->campaign_id,
                'channel_id'    => $campaignChannel->channel_id,
                'comment'       => $campaignChannel->comment,
                'uniqid'        => uniqid()
            )
        );

        $campaignChannelIndicator = CampaignChannelIndicator::loadCampaignChannelIndicator($campaign);

        $channels   =   Channel::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();

        die('--'.$newCampaignChannel->id.'---');

        return view('campaigns.campaignchannels' , compact('campaign' , 'channel' , 'channels' ));
    }
    
    
    /**
     * Remove the specified campaign_channel
     *
     * @param $id
     * @param $channelUniqid
     * @return mixed
     */
    public function destroy($id, $channelUniqid)
    {
        $campaign = Campaign::findOrFail($id);
        $campaignChannel = CampaignChannel::where('uniqid' , $channelUniqid)->where('campaign_id' , $campaign->id)->first();
        return json_encode(
            array(
                'deleted'   =>  $campaignChannel->delete(),
                'id'        => 'channel-'.$channelUniqid,
                'error_msg' => 'Une erreur est survenue lors de la suppression de ce canal.'
            )
        );
    }
}
