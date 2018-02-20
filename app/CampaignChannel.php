<?php

namespace App;

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

}
