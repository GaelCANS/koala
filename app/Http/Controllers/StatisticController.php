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
        dump($stats);

        return view('statistics.index', compact('data'));
    }
    public function detail()
    {
        $data = Statistics::dataSearch();

        return view('statistics.channel-stat', compact('data'));
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
