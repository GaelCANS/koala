<?php

namespace App\Http\Controllers;

use App\CampaignChannel;
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
        return view('plannings.index' , compact('day'));
    }


    public function events(Request $request)
    {
        //echo $request->start;
        $returns = CampaignChannel::CampaignChannelBetween($request->start , $request->end);
        /*var_dump($returns);
        die();
        $returns = array(
            array(
                'title' => 'Long Event',
                'start'=> '2018-03-02',
                'end'=> '2018-03-04'
            ),
            array(
                'id' => 999,
                'title' => 'Repeating Event 2',
                'start'=> '2018-03-09T16:00:00'
            ),
            array(
                'title' => 'Conference 2',
                'start'=> '2018-03-11',
                'end'=> '2018-03-13'
            ),
        );*/

        return response()->json($returns);
    }
}
