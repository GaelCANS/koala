<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampaignChannelIndicator extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaign_channel_indicator';

    protected $guarded = array('id');


    /**
     * Return goals and objectifs indicators for a campaign
     * @param $campaign : Campaign collection
     * @return null|array
     */
    public static function loadCampaignChannelIndicator($campaign)
    {

        $campaignChannelIndicator = null;
        if (!empty($campaign->Channels)) {
            foreach ($campaign->Channels as $channel) {
                if (!empty($channel->Indicators)) {
                    foreach ($channel->Indicators as $indicator) {
                        $campaignChannelIndicator[$indicator->id] =   CampaignChannelIndicator::where('campaign_channel_id' , $channel->pivot->id)
                            ->where('indicator_id' , $indicator->id)
                            ->get();
                    }
                }
            }
        }

        return $campaignChannelIndicator;
    }


    /**
     * Create or Update indicator campaign
     * @param $indicators
     */
    public static function saveCampaignChannelIndicator($indicators)
    {
        if (count($indicators)>0) {
            foreach ($indicators as $id => $indicator) {
                $campaignChannelIndicator = self::firstOrNew(array('uniqid' => $id));
                $campaignChannelIndicator->fill($indicator);
                $campaignChannelIndicator->save();
            }
        }
    }


}
