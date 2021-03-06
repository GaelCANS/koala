<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    protected $guarded = array('id');
    /**
     * RELATIONSHIPS
     */

    // one to many
    public function campaignChannelIndicators() {
        return $this->hasMany('App\CampaignChannelIndicator');
    }

    // 1 to 1
    public function channel() {
        return $this->belongsTo('App\Channel');
    }


    /**
     * CUSTOM
     */
    public static function bestIndicators()
    {
        $incators_stats = array(
            Parameter::getParameter('indicator_ouvreurs' , 'dashboard'),
            Parameter::getParameter('indicator_portee' , 'dashboard'),
            Parameter::getParameter('indicator_clics' , 'dashboard'),
            Parameter::getParameter('indicator_receveurs' , 'dashboard')
        );
        $statistics = array();
        foreach ($incators_stats as $incators_stat) {
            $stats = new \App\Library\Statistics($incators_stat);
            $today_quarter = $stats->getStatisticsNow();
            $before_quarter = $stats->getStatisticsBefore();
            $tmp_indicator = Indicator::findOrFail($incators_stat);
            $tmp_indicator->load('Channel');
            $statistics[] = array(
                'name'      => $tmp_indicator->name,
                'today'     => $today_quarter,
                'channel'   => $tmp_indicator->Channel->name,
                'before'    => $before_quarter,
                'percent'   => $before_quarter > 0 ? round($today_quarter*100/$before_quarter-100) : ''
            );
        }

        return $statistics;
    }

}
