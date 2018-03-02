<?php

namespace App;

use App\Library\Traits\Scopable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Campaign extends Model
{
    use Scopable;

    protected $guarded = array('id');


    /**
     * MUTATORS & ACCESSORS
     */
    public function getBeginshortAttribute() {
        if (empty($this->begin)) return '';
        return $this->begin != '0000-00-00' ?
            Carbon::createFromFormat('d/m/y', $this->begin)->format('m/y') :
            '';
    }

    public function getBeginAttribute($date) {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/y') :
            '';
    }

    public function getBeginLongAttribute() {
        if (empty($this->begin)) return '';
        return $this->begin != '0000-00-00' ?
            Carbon::createFromFormat('d/m/y', $this->begin)->format('d/m/Y') :
            '';
    }

    public function getEndshortAttribute() {
        if (empty($this->end)) return '';
        return $this->end != '0000-00-00' ?
            Carbon::createFromFormat('d/m/y', $this->end)->format('d/m/y') :
            '';
    }

    public function getEndLongAttribute() {
        if (empty($this->end)) return '';
        return $this->end != '0000-00-00' ?
            Carbon::createFromFormat('d/m/y', $this->end)->format('d/m/Y') :
            '';
    }

    public function getEndAttribute($date) {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/y') :
            '';
    }

    public function getPeriodAttribute()
    {
        $begin  = $this->begin != '' ? Carbon::createFromFormat('d/m/y', $this->begin)->format('m/y') : '';
        $end    = $this->end != '' ? Carbon::createFromFormat('d/m/y', $this->end)->format('m/y') : '';

        if ($begin != '' && $end != '')
            return $begin.' au '.$end;
        elseif ($begin != '' )
            return Carbon::createFromFormat('m/y', $begin)->format('F Y');
        elseif ($end != '' )
            return Carbon::createFromFormat('m/y', $end)->format('F Y');
        else
            return '';
    }

    public function getCountChannelAttribute()
    {
        $channels = CampaignChannel::where('campaign_id' , $this->id)->groupBy('channel_id')->get();
        return count($channels);
    }

    public function getChannelsDistinctAttribute()
    {
        $channels = CampaignChannel::where('campaign_id' , $this->id)->groupBy('channel_id')->get();
        return $channels;
    }

    public function getInProgressAttribute()
    {
        if ($this->begin == '') return true;
        return Carbon::createFromFormat('d/m/y', $this->begin)->isPast();
    }

    public function setBeginAttribute($date) {
        $this->attributes['begin'] = !empty($date) ? Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d') : '';
    }

    public function setEndAttribute($date) {
        $this->attributes['end'] = !empty($date) ? Carbon::createFromFormat('d/m/y', $date)->format('Y-m-d') : '';
    }

    /**
     * CUSTOMS
     */
    public static function getStatus() {
        return array('brouillon' , 'publiée');
    }


    /**
     * Duplicate campaign and campaignChannel and campaignChannelIndicator
     *
     * @param $id
     * @return mixed
     */
    public static function duplicateCampaign($id)
    {
        // Load current campaign and relations
        $campaign       = self::findOrFail($id);
        $campaign->load('Channels');

        // Duplicate campaign
        $newCampaign    = $campaign->replicate();
        $newCampaign->created_at = Carbon::now();
        $newCampaign->name = "[Copie] ".$campaign->name;
        $newCampaign->save();

        // Duplicate campaign_channels if exists
        CampaignChannel::duplicateCampaign($campaign,$newCampaign);

        return $newCampaign;
    }

    /**
     * @param $campaign
     * @return string
     */
    public static function consilidationResults($campaign)
    {
        if (!isset($campaign->Channels)) return 'ajouté';
        $added = array();
        $empty = array();
        foreach ($campaign->Channels as $campaign_channel) {
            $indicators = CampaignChannelIndicator::where('campaign_channel_id' , $campaign_channel->pivot->id)->get();
            if (count($indicators) > 0){
                foreach ($indicators as $indicator) {
                    if ($indicator->result > 0) {
                        $added[] = $indicator->result;
                    }
                    else {
                        $empty[] = $indicator->result;
                    }
                }
            }
        }

        if (count($added) == 0 && count($empty) == 0 ) {
            return 'ajoutés';
        }
        elseif (count($added) > 0 && count($empty) > 0 ) {
            return 'partiels';
        }
        elseif (count($added) > 0 && count($empty) == 0 ) {
            return 'ajoutés';
        }
        else {
            return 'aucuns';
        }
    }


    /**
     * RELATIONSHIPS
     */

    // many to many
    public function channels()
    {
        return $this->belongsToMany('App\Channel')->withPivot('id' , 'comment' , 'begin' , 'end' , 'uniqid' );
    }

    // many to many
    public function services()
    {
        return $this->belongsToMany('App\Service')->withTimestamps();
    }

    // many to many
    public function markets()
    {
        return $this->belongsToMany('App\Market')->withTimestamps();
    }

    // 1 to many
    public function campaignChannels()
    {
        return $this->hasMany('App\CampaignChannels');
    }

    // many to 1
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * SCOPES
     */
    /** /!\ Same requests on Library Statistics **/
    public function scopeSavedOnly($query)
    {
        return $query->where('saved','1');
    }

    public function scopePublished($query)
    {
        return $query->where('status','1');
    }

    public function scopeCmmValidation($query)
    {
        return $query->where('cmm','1');
    }
    /** /!\ End Same requests on Library Statistics **/

    public function scopeBetweenDate($query , $date)
    {
        return $query->where(
                    function ($q) use ($date) {

                        $q  ->where('begin', '<=' , $date->endOfMonth()->format('Y-m-d'));
                    }
                )
                ->where(
                    function ($q) use ($date) {
                        $q  ->where('end', '>=' , $date->startOfMonth()->format('Y-m-d'));
                    }
                );
    }

    public function scopeFilter($query , $datas)
    {
        // Results_state IN (ajoutés, partiels, aucuns)
        if (isset($datas->results) && count($datas->results)<3) {
            $query->whereIn('results_state' , $datas->results);
        }

        // Period Begin
        if (!empty($datas->begin)) {
            $query->where('begin' , '>=' , Carbon::createFromFormat('d/m/Y', $datas->begin)->format('Y-m-d'));
        }

        // Period End
        if (!empty($datas->end)) {
            $query->where('end' , '<=' , Carbon::createFromFormat('d/m/Y', $datas->end)->format('Y-m-d'));
        }

        // Markets
        if (isset($datas->markets) && count($datas->markets) < Market::notdeleted()->count()) {
            $campaigns_id = DB::table('campaign_market')->whereIn('market_id' , $datas->markets)->pluck('campaign_id');
            $query->whereIn('id' , $campaigns_id );
        }

        // Services
        if (isset($datas->services)) {
            $tous_value = array_search('0' , $datas->services);
            $services = $datas->services;
            if ($tous_value !== false) {
                unset($services[$tous_value]);
            }
            if (count($services) > 0) {
                $campaigns_id = DB::table('campaign_service')->whereIn('service_id' , $services)->pluck('campaign_id');
                $query->whereIn('id' , $campaigns_id );
            }
        }

        // Channels
        if (isset($datas->channels)) {
            $tous_value = array_search('0' , $datas->channels);
            $channels = $datas->channels;
            if ($tous_value !== false) {
                unset($channels[$tous_value]);
            }
            if (count($channels) > 0) {
                $campaigns_id = DB::table('campaign_channel')->whereIn('channel_id' , $channels)->pluck('campaign_id');
                $query->whereIn('id' , $campaigns_id );
            }
        }

        // Keywords
        if (!empty($datas->keywords)) {

            $keywords = trim($datas->keywords);
            $query->where( function ($q) use ($keywords) {

                  $q->where('name', 'LIKE', '%'.$keywords.'%')
                    ->orWhere('description', 'LIKE', '%'.$keywords.'%')
                    ->orWhere('cmm_comments', 'LIKE', '%'.$keywords.'%')
                    ->orWhere('results', 'LIKE', '%'.$keywords.'%')
                    ->orWhere('unica', 'LIKE', '%'.$keywords.'%');
                }
            );
        }

        return $query;
    }


    /**
     * OVERRIDE
     */

    // method override to instantiate custom pivot class
    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new CampaignChannelPivot($parent, $attributes, $table, $exists);
    }
}
