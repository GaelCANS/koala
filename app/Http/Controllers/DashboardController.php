<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignChannelIndicator;
use App\Indicator;
use App\Library;
use App\Notification;
use App\Parameter;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use OAuth\Common\Consumer\Credentials;
use Symfony\Component\HttpFoundation\Session\Session;

class DashboardController extends Controller
{

    public function __construct( ){

        $this -> middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Notification::campaigns_finish();
        // Campagnes en cours/ à venir
        $date = Carbon::now();
        $date = Carbon::createFromFormat('m-Y', date('m-Y'));

        $campaigns = Campaign::notdeleted()
                     ->savedOnly()
                     ->published()
                     ->cmmValidation()
                     ->betweenDate(Carbon::now())
                     ->orderBy('begin' , 'ASC')
                     ->get();

        $periods = (object) array(
            'text' =>
                str_replace(
                    array(
                        'January' ,
                        'February' ,
                        'March' ,
                        'April' ,
                        'May' ,
                        'June' ,
                        'July' ,
                        'August' ,
                        'September' ,
                        'October' ,
                        'November' ,
                        'December'
                    ) ,
                    array(
                        'Janvier' ,
                        'Février' ,
                        'Mars' ,
                        'Avril' ,
                        'Mai' ,
                        'Juin' ,
                        'Juillet' ,
                        'Août' ,
                        'Septembre' ,
                        'Octobre' ,
                        'Novembre' ,
                        'Décembre'
                    ) ,
                    $date->format('F Y')
                ),
            'date' => $date->format('m-Y'),
            'next' => route('dashboard-reload-campaigns' , array('period' => $date->addMonth()->format('m-Y'))),
            'prev' => route('dashboard-reload-campaigns' , array('period' => $date->subMonth(2)->format('m-Y'))),
        );
        // on récupère les ralations markets, users, channel liés à la campagne
        $campaigns->load('Channels');
        $campaigns->load('User');
        $campaigns->load('Markets');

        // My campaigns
        $mycampaigns =  Campaign::savedOnly()
                        ->notdeleted()
                        ->where('user_id' , Auth::user()->id )
                        ->orderBy('begin' , 'DESC')
                        ->take(5)
                        ->get();
        $mycampaigns->load('User');


        // Last indicators
        $indicators =   CampaignChannelIndicator::where('result' , '!=', '')
                        ->join('campaign_channel', 'campaign_channel.id', '=', 'campaign_channel_indicator.campaign_channel_id')
                        ->join('campaigns', 'campaigns.id', '=', 'campaign_channel.campaign_id')
                        ->where('campaigns.delete' , '0')
                        ->orderBy('campaign_channel_indicator.updated_at' , 'DESC')
                        ->take(5)
                        ->get();
        $indicators->load('Indicator');
        $indicators->load('CampaignChannel');


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
            'text' =>
                str_replace(
                    array(
                        'January' ,
                        'February' ,
                        'March' ,
                        'April' ,
                        'May' ,
                        'June' ,
                        'July' ,
                        'August' ,
                        'September' ,
                        'October' ,
                        'November' ,
                        'December'
                    ) ,
                    array(
                        'Janvier' ,
                        'Février' ,
                        'Mars' ,
                        'Avril' ,
                        'Mai' ,
                        'Juin' ,
                        'Juillet' ,
                        'Août' ,
                        'Septembre' ,
                        'Octobre' ,
                        'Novembre' ,
                        'Décembre'
                    ) ,
                    $date->format('F Y')
                ),
            'date' => $date->format('m-Y'),
            'next' => route('dashboard-reload-campaigns' , array('period' => $date->addMonth()->format('m-Y'))),
            'prev' => route('dashboard-reload-campaigns' , array('period' => $date->subMonth(2)->format('m-Y'))),
        );
        $campaigns = Campaign::notdeleted()
            ->savedOnly()
            ->published()
            ->cmmValidation()
            ->betweenDate(Carbon::createFromFormat('m-Y', $period))
            ->orderBy('begin' , 'ASC')
            ->get();
        $campaigns->load('Channels');
        $campaigns->load('User');
        $campaigns->load('Markets');


        $html = view('dashboards.campaigns' , compact('periods' , 'campaigns'))->render();

        return response()->json(
            array(
                'html'      => $html
            )
        );
    }


    public function myCampaigns()
    {
        \Cookie::queue(\Cookie::forget('filter'));
        Cookie::queue('filter' , array('users' => array(auth()->user()->id) ) );
        return redirect(action('CampaignController@index'));
    }
}
