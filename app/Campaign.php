<?php

namespace App;

use App\Library\Traits\Scopable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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

    public function getEndshortAttribute() {
        if (empty($this->end)) return '';
        return $this->end != '0000-00-00' ?
            Carbon::createFromFormat('d/m/y', $this->end)->format('m/y') :
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

        return $campaign;
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
    public function campaignChannels()
    {
        return $this->hasMany('App\CampaignChannels');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    /**
     * SCOPES
     */
    public function scopeSavedOnly($query)
    {
        return $query->where('saved','1');
    }

    public function scopeBetweenDate($query , $date)
    {
        return $query->where(
                    function ($q) use ($date) {

                        $q  ->where('begin', '<=' , $date->startOfMonth()->format('Y-m-d'))
                            ->orWhere('begin', '0000-00-00');
                    }
                )
                ->where(
                    function ($q) use ($date) {
                        $q  ->where('end', '>=' , $date->endOfMonth()->format('Y-m-d'))
                            ->orWhere('end', '0000-00-00');
                    }
                );
    }


    /**
     * OVERRIDE
     */

    // method override to instantiate custom pivot class
    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new CampaignChannelPivot($parent, $attributes, $table, $exists);
    }
}
