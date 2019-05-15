<?php

namespace App\Http\Controllers;

use App\Library\Statistics;
use App\Market;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

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
        $markets = Market::notdeleted()->orderBy('id', 'ASC')->get();
        $users = \App\User::Notdeleted()
            ->select(DB::raw("CONCAT(name,' ',firstname) AS name"),'id')
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $users[0]=   'Tous';
        ksort($users);
        $stats = Statistics::channelsStats(Statistics::channelsWithIndicator());

        return view('statistics.index', compact('data', 'stats', 'markets', 'users'));
    }
    public function detail($id)
    {
        $data = Statistics::dataSearch();
        $markets = Market::notdeleted()->orderBy('id', 'ASC')->get();
        $users = \App\User::Notdeleted()
            ->select(DB::raw("CONCAT(name,' ',firstname) AS name"),'id')
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $users[0]=   'Tous';
        ksort($users);

        $stats = Statistics::channelsStats( array(0 => (int)$id) );
        $stat = $stats[$id];
        $campaigns = Statistics::listOfCampaigns($stat['channel'],$stat['campaigns_id']);
        
        $graphStats = Statistics::graphStats($id);

        return view('statistics.channel-stat', compact('data', 'stat','campaigns','graphStats', 'markets','users'));
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
