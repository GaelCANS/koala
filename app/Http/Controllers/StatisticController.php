<?php

namespace App\Http\Controllers;

use App\Library\Statistics;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Statistics::dataSearch();
        $stats = Statistics::channelsStats(Statistics::channelsWithIndicator());

        return view('statistics.index', compact('data', 'stats'));
    }
    public function detail($id)
    {
        $data = Statistics::dataSearch();
        $stats = Statistics::channelsStats( array(0 => (int)$id) );
        $stat = $stats[$id];
        $campaigns = Statistics::listOfCampaigns($stat['channel'],$stat['campaigns_id']);
        
        $graphStats = Statistics::graphStats($id);

        return view('statistics.channel-stat', compact('data', 'stat','campaigns','graphStats'));
    }

    public function filter(Request $request)
    {
        Cookie::queue('stats' , $request->all());
        return redirect(action('StatisticController@index'));
    }

    /**
     * Clear filter
     *
     * @param Request $request
     */
    public function clearfilter(Request $request)
    {
        \Cookie::queue(\Cookie::forget('stats'));
        return redirect(action('StatisticController@index'));
    }
}
