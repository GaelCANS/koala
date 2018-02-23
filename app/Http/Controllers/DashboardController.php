<?php

namespace App\Http\Controllers;

use App\Campaign;
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
        $periods = (object) array(
            'text' => $date->format('F Y'),
            'date' => $date->format('m-Y'),
            'next' => route('dashboard-reload-campaigns' , array('period' => $date->addMonth()->format('m-Y'))),
            'prev' => route('dashboard-reload-campaigns' , array('period' => $date->subMonth(2)->format('m-Y'))),
        );
        $campaigns = Campaign::notdeleted()
                     ->savedOnly()
                     ->betweenDate($date)
                     ->orderBy('begin' , 'ASC')
                     ->get();
        $campaigns->load('Channels');
        $campaigns->load('User');


        return view('dashboards.index' , compact('periods' , 'campaigns'));
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
            ->betweenDate($date)
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
