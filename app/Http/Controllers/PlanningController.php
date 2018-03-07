<?php

namespace App\Http\Controllers;

use App\CampaignChannel;
use App\Channel;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlanningController extends Controller
{
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
}
