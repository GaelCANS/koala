<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignChannelIndicator;
use App\Indicator;
use App\Library;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Campagnes en cours/ à venir
        $date = Carbon::now();
        $campaigns = Campaign::notdeleted()
                     ->savedOnly()
                     ->published()
                     ->cmmValidation()
                     ->betweenDate(Carbon::now())
                     ->orderBy('begin' , 'ASC')
                     ->get();

        $periods = (object) array(
            'text' => $date->format('F Y'),
            'date' => $date->format('m-Y'),
            'next' => route('dashboard-reload-campaigns' , array('period' => $date->addMonth()->format('m-Y'))),
            'prev' => route('dashboard-reload-campaigns' , array('period' => $date->subMonth(2)->format('m-Y'))),
        );
        $campaigns->load('Channels');
        $campaigns->load('User');


        // My campaigns
        $mycampaigns =  Campaign::savedOnly()
                        ->where('user_id' , 3)
                        ->orderBy('begin' , 'DESC')
                        ->take(5)
                        ->get();
        $mycampaigns->load('User');


        // Last indicators
        $indicators =   CampaignChannelIndicator::where('result' , '>', 0)
                        ->orderBy('updated_at' , 'DESC')
                        ->take(5)
                        ->get();
        $indicators->load('Indicator');
        $indicators->load('campaignChannel');


        // Best indicators
        $statistics = Indicator::bestIndicators();
        $quarter    = ceil(date("m", time())/3);
        $best_email = Library\Statistics::bestEmail();
        $best_fb    = Library\Statistics::bestFacebook();
        $best_bann  = Library\Statistics::bestBanniere();

        return view('dashboards.index' , compact('periods' , 'campaigns' , 'mycampaigns' , 'indicators' , 'statistics' , 'quarter' , 'best_email' , 'best_fb' , 'best_bann'));
    }

    public function reloadCampaigns($period)
    {
        // REPRENDRE ICI - charger le dashboard en ajax avec la bonne période
        // Campagnes en cours/ à venir
        $date = Carbon::createFromFormat('m-Y', $period);

        $periods = (object) array(
            'text' => $date->format('F Y'),
            'date' => $date->format('m-Y'),
            'next' => route('dashboard-reload-campaigns' , array('period' => $date->addMonth()->format('m-Y'))),
            'prev' => route('dashboard-reload-campaigns' , array('period' => $date->subMonth(2)->format('m-Y'))),
        );
        $campaigns = Campaign::notdeleted()
            ->savedOnly()
            ->betweenDate(Carbon::createFromFormat('m-Y', $period))
            ->orderBy('begin' , 'ASC')
            ->get();
        $campaigns->load('Channels');
        $campaigns->load('User');


        $html = view('dashboards.campaigns' , compact('periods' , 'campaigns'))->render();

        return response()->json(
            array(
                'html'      => $html
            )
        );
    }
}
