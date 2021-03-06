<?php

namespace App;

use App\Library\Statistics;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CampaignChannel extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'campaign_channel';

    protected $guarded = array('id');

    public $preventMutator = false;


    /**
     * MUTATORS & ACCESSORS - see CampaignChannelPivot for the get function
     */
    public function setBeginAttribute($date)
    {
        if (!$this->preventMutator)
            $this->attributes['begin'] = !empty($date) ? Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d') : '';
        else
            $this->attributes['begin'] = $date;
    }

    public function setEndAttribute($date)
    {
        if (!$this->preventMutator)
            $this->attributes['end'] = !empty($date) ? Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d') : '';
        else
            $this->attributes['end'] = $date;
    }

    public function getIsFinishAttribute()
    {
        if ($this->end == '') return false;
        return Carbon::createFromFormat('Y-m-d', $this->end)->isPast();
    }

    public function getPeriodAttribute()
    {
        if ($this->begin != '' && $this->begin != '0000-00-00' && $this->end != '' && $this->end != '0000-00-00')
            return Carbon::createFromFormat('Y-m-d', $this->begin)->format('d/m/y').' - '.Carbon::createFromFormat('Y-m-d', $this->end)->format('d/m/y');
        elseif ($this->begin != '' && $this->end == '')
            return Carbon::createFromFormat('Y-m-d', $this->begin)->format('d/m/y').' - ';
        elseif ($this->begin == '' && $this->end != '')
            return ' - '.Carbon::createFromFormat('Y-m-d', $this->end)->format('d/m/y');
        else
            return ' - ';
    }



    /**
     * RELATIONSHIPS
     */

    // one to many
    public function campaignChannelIndicators() {
        return $this->hasMany('App\CampaignChannelIndicator');
    }

    // 1 to 1
    public function campaign() {
        return $this->belongsTo('App\Campaign');
    }

    // 1 to 1
    public function channel() {
        return $this->belongsTo('App\Channel');
    }



    /**
     * CUSTOMS
     */

    /**
     * @param $begin
     * @param $end
     * @return mixed
     */ 
    public static function CampaignChannelBetween($begin, $end, $channels = array())
    {
        return DB::table('campaign_channel')
            //->select('campaign_channel.begin AS start' , 'campaign_channel.end AS end' ,'campaign_channel.id AS id' , DB::raw('channels.class_name AS className') , DB::raw('CONCAT("[",channels.name,"]"," ",campaigns.name) AS title'))
            ->select('campaign_channel.begin AS start' , DB::raw('DATE_ADD(campaign_channel.end, INTERVAL 1 DAY) AS end') ,'campaign_channel.id AS id' , DB::raw('channels.class_name AS className') , DB::raw('CONCAT("[",channels.name,"]"," ",campaigns.name) AS title'))
            ->join('campaigns' , 'campaign_channel.campaign_id' , '=' , 'campaigns.id')
            ->join('channels' , 'channels.id' , '=' , 'campaign_channel.channel_id')
            /** /!\ Uses in scope on the Campaign Model **/
            ->where('campaigns.saved','1')
            ->where('campaigns.cmm','1')
            ->where('campaigns.delete','0')
            ->where('campaigns.status','1')
            ->whereIn('campaign_channel.channel_id',$channels)
            /** /!\ End Uses in scope on the Campaign Model **/
            ->where('campaign_channel.begin' , '<=' , $end)
            ->where('campaign_channel.end' , '>=' , $begin)
            ->get();
    }

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


    public function scopeCampaignChannelStats($query,$channel,$datas=null)
    {
        $datas = $datas == null ? Statistics::dataSearch() : $datas;

        $campaignsId = self::whereChannelId($channel->id)
            ->whereBetween(
                'begin' ,
                array(
                    Carbon::createFromFormat('d/m/Y', $datas['begin'])->format('Y-m-d 00:00:00') ,
                    Carbon::createFromFormat('d/m/Y', $datas['end'])->format('Y-m-d 23:59:59')
                )
            )
            ->distinct('campaign_id')
            ->lists('campaign_id')
            ->toArray();

        // Markets
        if (isset($datas['markets']) && Market::whereDelete(0)->count() != count($datas['markets']) && count($datas['markets']) > 0) {

            $campaignsMarket = DB::table('campaign_market')
                                ->distinct('campaign_id')
                                //->distinct('campaign_id')
                                ->whereIn('campaign_id' , $campaignsId)
                                ->whereIn('market_id',$datas['markets'])
                                ->lists('campaign_id');
            $campaignsId = $campaignsMarket;
        }

        // Users
        if (isset($datas['users']) && count($datas['users']) > 0 ) {

            if (count($datas['users']) > 1 || (count($datas['users']) == 1 && $datas['users'][0] != 0)) {
                $campaignsUsers = Campaign::distinct('id')
                    ->whereIn('id' , $campaignsId)
                    ->whereIn('user_id',$datas['users'])
                    ->lists('id');

                $campaignsId = $campaignsUsers;
            }

        }

        $query = $query->whereIn('campaign_id',$campaignsId);
        $query = $query->whereBetween(
            'begin' ,
            array(
                Carbon::createFromFormat('d/m/Y', $datas['begin'])->format('Y-m-d 00:00:00') ,
                Carbon::createFromFormat('d/m/Y', $datas['end'])->format('Y-m-d 23:59:59')
            ));

        return $query;
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


