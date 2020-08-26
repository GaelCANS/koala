<?php

namespace App;

use Carbon\Carbon;
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
     * ACCESSORS // MUTATOS
     */
    public function getIndicatorInteractionAttribute()
    {
        return in_array($this->indicator_id , array(Parameter::getParameter('interaction' , 'indicator') , Parameter::getParameter('interaction2' , 'indicator')) );
    }

    public function getIndicatorPorteeAttribute()
    {
        return in_array($this->indicator_id , array(Parameter::getParameter('portee' , 'indicator') , Parameter::getParameter('portee2' , 'indicator')) );
    }

    public function getIndicatorEngagementAttribute()
    {
        return in_array($this->indicator_id , array(Parameter::getParameter('engagement' , 'indicator') , Parameter::getParameter('engagement2' , 'indicator')) );
    }

    public function getIndicatorClicFbAttribute()
    {
        return in_array($this->indicator_id , array(Parameter::getParameter('clics_fb' , 'indicator') , Parameter::getParameter('clics_fb2' , 'indicator')) );
    }

    public function getIndicatorTauxClicFbAttribute()
    {
        return in_array($this->indicator_id , array(Parameter::getParameter('tx_clic_fb' , 'indicator') , Parameter::getParameter('tx_clic_fb2' , 'indicator')) );
    }

    public function getSpeClassAttribute()
    {
        if ($this->indicatorInteraction) {
            return 'interaction';
        }
        else if ($this->indicatorPortee) {
            return 'portee';
        }
        else if ($this->indicatorEngagement) {
            return 'engagement';
        }
        else if ($this->indicatorClicFb) {
            return 'clic_fb';
        }
        else if ($this->indicatorTauxClicFb) {
            return 'tx_clic_fb';
        }
        return "";
    }


    /**
     * RELATIONSHIPS
     */

    // 1 to 1
    public function indicator() {
        return $this->belongsTo('App\Indicator');
    }

    // 1 to 1
    public function campaignChannel() {
        return $this->belongsTo('App\CampaignChannel');
    }


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
                        $campaignChannelIndicator[$channel->pivot->uniqid][$indicator->id] =   CampaignChannelIndicator::where('campaign_channel_id' , $channel->pivot->id)
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


    /**
     * Duplicate Campaign - duplicate campaignChannelIndicator for the new campaign
     *
     * @param $campaignChannel_id
     * @param $newCampaignChannel_id
     */
    public static function duplicateCampaign($campaignChannel_id, $newCampaignChannel_id)
    {
        // Load current CampaignChannel
        $campaignChannel = CampaignChannel::findOrFail($campaignChannel_id);
        $campaignChannel->load('CampaignChannelIndicators');

        if ($campaignChannel->CampaignChannelIndicators) {
            foreach ($campaignChannel->CampaignChannelIndicators as $indicator) {
                $newIndicator = $indicator->replicate();
                $newIndicator->campaign_channel_id = $newCampaignChannel_id;
                $newIndicator->created_at = Carbon::now();
                $newIndicator->uniqid = uniqid();
                $newIndicator->save();
            }
        }

    }


}
