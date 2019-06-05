<?php

namespace App\Http\Controllers;

use App\CampaignChannel;
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
        $data = Statistics::dataSearch();
        $markets = Market::notdeleted()->orderBy('id', 'ASC')->get();
        $users = \App\User::Notdeleted()
            ->select(DB::raw("CONCAT(name,' ',firstname) AS name"),'id')
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $users[0]=   'Tous';
        ksort($users);
        $page = 'index';
        $stats = Statistics::channelsStats(Statistics::channelsWithIndicator());

        return view('statistics.index', compact('data', 'stats', 'markets', 'users','page'));
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
        $page = 'detail';

        $stats = Statistics::channelsStats( array(0 => (int)$id) );
        if (count($stats) == 0 ) return redirect(action('StatisticController@index'));
        $stat = $stats[$id];
        $campaigns = Statistics::listOfCampaigns($stat['channel'],$stat['campaigns_id']);

        $printedChannels = CampaignChannel::whereChannelId($id)->whereBetween(
            'begin' ,
            array(
                Carbon::createFromFormat('d/m/Y', $data['begin'])->format('Y-m-d 00:00:00') ,
                Carbon::createFromFormat('d/m/Y', $data['end'])->format('Y-m-d 23:59:59')
            )
        )->get();
        $printedChannels->load('Campaign');
        
        $graphStats = Statistics::graphStats($id);

        return view('statistics.channel-stat', compact('data', 'stat','campaigns','graphStats', 'markets','users','page','printedChannels'));
    }


    public function ajaxIndex(Request $request)
    {
        dd($request);
        Cookie::queue('stats' , $request->all());
        $stats = Statistics::channelsStats(Statistics::channelsWithIndicator());
        $html = view('statistics.index-datas' , compact('stats'))->render();

        return response()->json(
            array(
                'html'      => $html
            )
        );
    }

    public function filter(Requests\StatisticRequest $request)
    {
        Cookie::queue('stats' , $request->all());
        //return redirect(action('StatisticController@index'));
        return redirect()->back();
    }

    /**
     * Clear filter
     *
     * @param Request $request
     */
    public function clearfilter(Request $request)
    {
        \Cookie::queue(\Cookie::forget('stats'));
        return redirect()->back();
        //return redirect(action('StatisticController@index'));
    }
}
