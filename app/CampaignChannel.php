<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CampaignChannel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaign_channel';

    protected $guarded = array('id');


    /**
     * MUTATORS & ACCESSORS - see CampaignChannelPivot for the get function
     */
    public function setBeginAttribute($date) {
        $this->attributes['begin'] = !empty($date) ? Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d') : '';
    }

    public function setEndAttribute($date) {
        $this->attributes['end'] = !empty($date) ? Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d') : '';
    }



    /**
     * RELATIONSHIPS
     */

    // one to many
    public function campaignChannelIndicators() {
        return $this->hasMany('App\CampaignChannelIndicator');
    }



    /**
     * CUSTOMS
     */

    /**
     * Update or create CampaignChannel
     * @param $channelDatas
     * @return array
     */
    public static function saveCampaignChannel($channelDatas)
    {
        $idCampaignChannel  = array();
        if (count($channelDatas)>0) {
            foreach ($channelDatas as $id => $campaignChannelInfos) {
                $campaignChannel = self::firstOrNew(array('uniqid' => $id));
                $campaignChannel->fill($campaignChannelInfos);
                $campaignChannel->save();
                $idCampaignChannel[] = $campaignChannel->id;
            }
        }

        return $idCampaignChannel;
    }


    /**
     * Duplicate campaign - duplicate campaignChannel for the new campaign
     *
     * @param $campaign
     * @param $newCampaign
     */
    public static function duplicateCampaign($campaign, $newCampaign)
    {
        // Duplicate campaignChannel if exist
        if ($campaign->Channels) {
            foreach ($campaign->Channels as $channel) {
                if ($channel->pivot) {
                    $newCampaignChannel = self::create(
                        array(
                            'campaign_id'   => $newCampaign->id,
                            'channel_id'    => $channel->pivot->channel_id,
                            'comment'       => $channel->pivot->comment,
                            'begin'         => $channel->pivot->begin,
                            'end'           => $channel->pivot->end,
                            'uniqid'        => uniqid()
                        )
                    );

                    // Duplicate CampaignChannelIndicator if exist
                    CampaignChannelIndicator::duplicateCampaign($channel->pivot->id , $newCampaignChannel->id);
                }
            }
        }
    }


    /**
     * Delete the campaign channel deleted by user
     * @param $fresh
     * @param $id
     */
    public static function deleteCampaignChannel($fresh, $id)
    {
        $olds = self::where('campaign_id', $id)->get();
        if (count($olds) > 0) {
            foreach ($olds as $old) {
                if (!in_array($old->id , $fresh)) {
                    $campainChannel = CampaignChannel::find($old->id);
                    $campainChannel->delete();
                }
            }
        }
    }

    


    /**
     * When a campaign_channel is delete, campaign_channel_indicators are automatically deleted
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(function($campaignChannel)
        {
            $campaignChannel->Campaignchannelindicators()->delete();;
        });
    }

}


