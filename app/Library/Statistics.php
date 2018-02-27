<?php

namespace App\Library;
use App\Campaign;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: gaellevant
 * Date: 26/02/2018
 * Time: 15:00
 */
class Statistics
{

    private $indicator      = null;

    private $month          = null;

    private $value          = 0;

    private $evolution      = 0;


    /**
     * Statistics constructor.
     * @param $indicator
     */
    public function __construct($indicator)
    {
        $this->indicator = \App\Indicator::findOrFail($indicator);
        $this->month     = date('m');
    }

    public function getStatisticsNow()
    {
        $today = \Carbon\Carbon::now();
        return $this->doCalcul($today);

    }

    public function getStatisticsBefore()
    {
        $month = Carbon::now()->format('m')-3;
        $year = date('Y');
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        $date = Carbon::createFromFormat('m-Y' , $month.'-'.$year);
        return $this->doCalcul($date);
    }

    private function doCalcul($date)
    {
        $begin = $this->firstDay($date);
        $end = $this->lastDay($date);

        $average     = DB::table('campaigns')
                     ->join('campaign_channel' , 'campaigns.id' , '=' , 'campaign_channel.campaign_id')
                     ->where('campaigns.delete' , '0')
                     ->where('campaigns.saved' , '1')
                     ->where('campaigns.end' , '<=' , Carbon::now()->format('Y-m-d'))
                     ->whereBetween('campaigns.end' , array($begin , $end) )
                     ->join('campaign_channel_indicator' , 'campaign_channel.id' , '=' , 'campaign_channel_indicator.campaign_channel_id')
                     ->where('campaign_channel_indicator.indicator_id', $this->indicator->id)
                     ->where('campaign_channel_indicator.result' , '>' , 0)
                     ->avg('campaign_channel_indicator.result');

        return round($average);
    }

    private function getBeginQuarter($month)
    {
        if ($month>0 && $month<4)
        {
            return '01';
        }
        elseif ($month>3 && $month<7)
        {
            return '04';
        }
        elseif ($month>6 && $month<10)
        {
            return '07';
        }
        elseif ($month>9 && $month<13)
        {
            return '10';
        }
    }

    private function firstDay($date)
    {
        return \Carbon\Carbon::createFromFormat('m-Y' , $this->getBeginQuarter($date->format('m')).'-'.$date->format('Y') )->startOfMonth()->format('Y-m-d');
    }

    private function lastDay($date)
    {
        return \Carbon\Carbon::createFromFormat('m-Y' , ($this->getBeginQuarter($date->format('m'))+2).'-'.$date->format('Y') )->endOfMonth()->format('Y-m-d');
    }



}