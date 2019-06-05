<?php

namespace App\Http\Controllers;

use App\CampaignChannel;
use App\Channel;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class PlanningController extends Controller
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
        $day = Carbon::now()->format('Y-m-d');
        $channels= Channel::Notdeleted()->orderBy('name' , 'ASC')->get();
        return view('plannings.index' , compact('day' , 'channels'));
    }


    public function events(Request $request)
    {
        $returns = CampaignChannel::CampaignChannelBetween($request->start , $request->end, $request->channels);
        return response()->json($returns);
    }

    public function timeline()
    {
        $day = Carbon::now()->format('Y-m-d');
        $channels= Channel::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $channels[0]=   'Sélectionnez votre canal';
        ksort($channels);

        $request = (object)Cookie::get('timeline');
        if (empty($request->begin)) {
            $request->begin = Carbon::now()->subMonth()->format('d/m/Y');
        }
        if (empty($request->end)) {
            $request->end = Carbon::now()->format('d/m/Y');
        }

        $campaigns = null;
        if (!empty($request->channel)) {
            $query = CampaignChannel::whereChannelId($request->channel)->orderBy('begin');
            if (!empty($request->begin)) {
                $query = $query->where('end' , '>' , Carbon::createFromFormat('d/m/Y',$request->begin)->format('Y-m-d'));
            }
            if (!empty($request->end)) {
                $query = $query->where('begin' , '<' , Carbon::createFromFormat('d/m/Y',$request->end)->format('Y-m-d'));
            }

            $campaigns = $query->get();
            $campaigns->load('Campaign');
        }

        return view('plannings.timeline' , compact('day' , 'channels' , 'request', 'campaigns'));
    }

    public function filter(Request $request)
    {
        Cookie::queue('timeline' , $request->all());
        return redirect()->back();
    }



    /**
     * Clear filter
     *
     * @param Request $request
     */
    public function clearfilter()
    {
        \Cookie::queue(\Cookie::forget('timeline'));
        //return redirect()->action('PlanningController@timeline');
    }
}
