<?php

namespace App\Library;
use App\Campaign;
use App\CampaignChannel;
use App\CampaignChannelIndicator;
use App\Channel;
use App\Indicator;
use App\Market;
use App\Parameter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
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

    private $isBan          = null;


    /**
     * Statistics constructor.
     * @param $indicator
     */
    public function __construct($indicator)
    {
        $this->indicator = \App\Indicator::findOrFail($indicator);
        $this->month     = date('m');
        $this->isBan     = $this->isBanniere();
    }

    private function isBanniere()
    {
        return Parameter::getParameter('indicator_clics' , 'dashboard') == $this->indicator->id ? true : false;
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
            ->whereBetween('campaign_channel.end' , array($begin , $end) )
            ->join('campaign_channel_indicator' , 'campaign_channel.id' , '=' , 'campaign_channel_indicator.campaign_channel_id')
            ->where('campaign_channel_indicator.indicator_id', $this->indicator->id)
            ->where('campaign_channel_indicator.result' , '>' , 0)
            ->avg('campaign_channel_indicator.result');

        if ($this->isBan) {
            $dateBegin = Carbon::parse($begin);
            $dateEnd   = Carbon::parse($end);
            $diff = $dateBegin->diffInDays($dateEnd);
            if ( $diff > 0 )
                return round($average/$diff);
            else
                return '-';
        }
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


    public static function bestEmail()
    {
        $id = Parameter::getParameter('best_email' , 'dashboard');
        if ($id > 0)
            return self::bestRequest($id);
        return false;
    }


    public static function bestFacebook()
    {
        $id = Parameter::getParameter('best_facebook' , 'dashboard');
        if ($id > 0)
            return self::bestRequest($id);
        return false;
    }


    public static function bestBanniere()
    {
        $id = Parameter::getParameter('best_banniere' , 'dashboard');
        if ($id > 0)
            return self::bestRequest($id);
        return false;
    }

    private static function bestRequest($indicator)
    {
        $last_month = new Carbon('last month');
        $first_day  = $last_month->startOfMonth()->format('Y-m-d');
        $last_day   = $last_month->endOfMonth()->format('Y-m-d');


        // Dans le cas d'une bannière, on calcule les stats par clics/jours et non pas sur le volume total de clics
        // Il y a donc une exception dans la requête

        if ($indicator == Parameter::getParameter('best_banniere' , 'dashboard')) {
            $best       =   DB::table('campaign_channel_indicator')
                ->select('campaign_channel.campaign_id' , 'campaign_channel_indicator.result' , 'campaign_channel.begin', DB::raw('datediff(`campaign_channel`.`end`, `campaign_channel`.`begin`) AS nb_jours') , DB::raw('`campaign_channel_indicator`.`result`/datediff(`campaign_channel`.`end`, `campaign_channel`.`begin`) AS clics_jour'))
                ->join('campaign_channel' , 'campaign_channel.id' , '=' , 'campaign_channel_indicator.campaign_channel_id')
                ->join('campaigns' , 'campaigns.id' , '=' , 'campaign_channel.campaign_id')
                ->where('campaign_channel_indicator.indicator_id' , $indicator)
                /** /!\ Uses in scope on the Campaign Model **/
                ->where('campaigns.saved','1')
                ->where('campaigns.cmm','1')
                ->where('campaigns.status','1')
                /** /!\ End Uses in scope on the Campaign Model **/
                ->whereBetween('campaign_channel.begin' , array($first_day , $last_day))
                ->where('campaign_channel_indicator.indicator_id' , $indicator)
                ->where('campaign_channel_indicator.result' , '>' , 0)
                ->Orderby('clics_jour' , 'DESC')->first();
        }
        else {
            $best       =   DB::table('campaign_channel_indicator')
                ->select('campaign_channel.campaign_id' , 'campaign_channel_indicator.result' , 'campaign_channel.begin')
                ->join('campaign_channel' , 'campaign_channel.id' , '=' , 'campaign_channel_indicator.campaign_channel_id')
                ->join('campaigns' , 'campaigns.id' , '=' , 'campaign_channel.campaign_id')
                ->where('campaign_channel_indicator.indicator_id' , $indicator)
                /** /!\ Uses in scope on the Campaign Model **/
                ->where('campaigns.saved','1')
                ->where('campaigns.cmm','1')
                ->where('campaigns.status','1')
                /** /!\ End Uses in scope on the Campaign Model **/
                ->whereBetween('campaign_channel.begin' , array($first_day , $last_day))
                ->where('campaign_channel_indicator.indicator_id' , $indicator)
                ->where('campaign_channel_indicator.result' , '>' , 0)
                ->Orderby('campaign_channel_indicator.result' , 'DESC')->first();
        }



        if ($best != null && $best->result > 0) {
            $campaign = Campaign::findOrFail($best->campaign_id);
            return (object) array(
                'value'     => $best->result,
                'name'      => $campaign->name,
                'special'   => ($indicator == Parameter::getParameter('best_banniere' , 'dashboard') ? (int)$best->clics_jour : ''),
                'date'      => \Carbon\Carbon::createFromFormat('Y-m-d', $best->begin)->format('d/m/Y'),
                'campaign'  => $campaign
            );
        }
        return false;
    }



    public static function dataSearch()
    {
        // Récupération des critères de filtre stockés en cookie
        $request = (object)Cookie::get('stats');

        $datas = array(
            'begin'    => !empty($request->begin) ? $request->end : Carbon::today()->subDays(30)->format('d/m/Y'),
            'end'      => !empty($request->end) ? $request->begin : Carbon::today()->format('d/m/Y'),
            'markets'  => !empty($request->markets) ? array_map('intval' , $request->markets ) : Market::notdeleted()->pluck('id')->toArray(),
            'users'    => !empty($request->users) ? array_map('intval' , $request->users ) : array(0),
        );

        if ($datas['begin'] > $datas['end']) {
            $tmp = $datas['begin'];
            $datas['begin'] = $datas['end'];
            $datas['end'] = $tmp;
        }

        return $datas;
    }

    public static function channelsWithIndicator()
    {
        return Indicator::whereDelete('0')->distinct('channel_id')->pluck('channel_id')->toArray();
    }

    public static function countCampaigns($channel)
    {
        return CampaignChannel::campaignChannelStats($channel)
            ->groupBy('campaign_id')
            ->get();
    }


    public static function channelsStats($channels)
    {
        $channel_stats = array();
        foreach ($channels as $channel_id) {
            $channel = Channel::findOrFail($channel_id);
            $countCampaigns = self::countCampaigns($channel);
            if ($countCampaigns->count() == 0) continue;
            $channel->load('Indicators');
            $channel_stats[$channel->id] = array(
                'channel' => $channel,
                'stats'   => self::channelStats($channel),
                'campaigns' => $countCampaigns->count(),
                'campaigns_id' => $countCampaigns
            );
        }
        return $channel_stats;
    }

    public static function channelStats($channel, $campaign = null)
    {
        $datas = self::dataSearch();
        $channelIndicators = array();
        foreach ($channel->Indicators as $indicator) {
            if ($indicator->delete == 1) continue;
            $channelIndicators[$indicator->id] = array(
                'indicator' => $indicator->name,
                'id' => $indicator->id,
                'type' => $indicator->type,
                'average'   => self::getIndicators($indicator, $channel, $campaign)
            );
        }
        return $channelIndicators;
    }

    public static function getIndicators($indicator, $channel, $campaign = null, $datas = null)
    {
        $whereInRequest = CampaignChannel::campaignChannelStats($channel , ($datas == null ? null : $datas) )->select('id');
        if ($campaign != null) {
            $whereInRequest->whereCampaignId($campaign->campaign_id);
        }
        $indicators = CampaignChannelIndicator::whereIndicatorId($indicator->id)
            ->whereIn(
                'campaign_channel_id',
                $whereInRequest->get()
            );

        return self::indicatorStats($indicators->get(), $indicator);
    }

    public static function indicatorStats($indicators, $id)
    {
        if (count($indicators)) {
            $total = 0;
            foreach ($indicators as $indicator) {

                if ($indicator->indicator_id != Parameter::getParameter('best_banniere' , 'dashboard')) {
                    $total += (float)$indicator->result;
                }
                elseif ($indicator->indicator_id == Parameter::getParameter('best_banniere' , 'dashboard') && $indicator->campaignChannel->begin != '0000-00-00' && $indicator->campaignChannel->end != '0000-00-00') {
                    $indicator->load('campaignChannel');
                    $dateBegin = Carbon::parse($indicator->campaignChannel->begin);
                    $dateEnd   = Carbon::parse($indicator->campaignChannel->end);
                    $diff = $dateBegin->diffInDays($dateEnd);
                    $diff = $diff > 0 ? $diff : 1;
                    $total += (float)$indicator->result/$diff;
                }


            }
            return $total/count($indicators);
        }
    }

    public static function listOfCampaigns($channel, $campaigns)
    {
        $stats = array();
        foreach ($campaigns as $campaign) {
            $campaign->load('Campaign');
            $campaign->Campaign->load('Markets');
            $stats[$campaign->id] = array(
                'campaign' => $campaign,
                'indicators' => self::channelStats($channel, $campaign)
            );
        }
        return $stats;
    }

    public static function graphStats($channel_id)
    {
        $dateStats = new DateStatistics(Statistics::dataSearch());
        $dates = $dateStats->monthsList();
        $graph = array();
        $channel = Channel::findOrFail($channel_id);
        $channel->load('Indicators');
        foreach ($channel->Indicators as $indicator) {
            if ($indicator->delete == 1) continue;
            $graph[$indicator->name] = array(
                'type' => $indicator->type,
                'periodes' => array()
            );
            foreach ($dates as $date) {
                $graph[$indicator->name]['periodes'][$date['name']] = self::getIndicators($indicator,$channel,null,$date);
            }
        }

        return $graph;
    }






}