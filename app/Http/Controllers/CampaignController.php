<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::where('delete','0')->orderBy('id' , 'DESC')->get();
        return view('campaigns.index' , compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaign = null;
        $status     = Campaign::getStatus();
        $users      =   User::select(DB::raw("CONCAT(firstname,' ',name) AS name"),'id')
            ->where('delete' , '0')
            ->orderBy('firstname' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        return view('campaigns.show' , compact('campaign' , 'status' , 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CampaignRequest $request)
    {
        $campaign = Campaign::create($request->all());
        return redirect(action('CampaignController@index'))->with('success' , "La campagne {$campaign->name} a bien été créée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign   = Campaign::findOrFail($id);
        $status     = Campaign::getStatus();
        $users      =   User::select(DB::raw("CONCAT(firstname,' ',name) AS name"),'id')
                        ->where('delete' , '0')
                        ->orderBy('firstname' , 'ASC')
                        ->pluck('name' , 'id')
                        ->toArray();
        return view('campaigns.show' , compact('campaign' , 'status' , 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CampaignRequest $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->update( $request->all() );
        return redirect()->back()->with('success' , "La campagne vient d'être mise à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->update( array('delete' => '1') );
        return redirect(URL::previous())->with('success' , 'La campagne a bien été supprimée');
    }
}
