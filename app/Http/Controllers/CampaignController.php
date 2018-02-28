<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignChannel;
use App\CampaignChannelIndicator;
use App\CampaignChannelPivot;
use App\Channel;
use App\Service;
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
        $campaigns = Campaign::notdeleted()->savedOnly()->orderBy('id' , 'DESC')->paginate(10);
        $campaigns->load('Channels');
        return view('campaigns.index' , compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaign   = null;
        $status     = Campaign::getStatus();
        $users      =   User::select(DB::raw("CONCAT(firstname,' ',name) AS name"),'id')
            ->Notdeleted()
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
        // Create of campaign
        $campaign = Campaign::create($request->all());
        
        // Sync campaign_channel (create, update, delete)
        $channelDatas           = $request->only('channel');
        $freshCampaignChannel   = CampaignChannel::saveCampaignChannel($channelDatas['channel']);
        CampaignChannel::deleteCampaignChannel($freshCampaignChannel,$id);

        // Sync campaign_channel_indicator (create, update, delete)
        $indicatorDatas          = $request->only('indicator');
        CampaignChannelIndicator::saveCampaignChannelIndicator($indicatorDatas['indicator']);

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
        // Chargement de la campagne et des tables associées
        $campaign   = Campaign::findOrFail($id);
        $campaign->load('Channels');
        $campaign->Channels->load('Indicators');

        // Chargement manuel des objectifs et résultats des indicateurs de la campagne
        $campaignChannelIndicator = CampaignChannelIndicator::loadCampaignChannelIndicator($campaign);

        // Chargement des données annexes utiles
        $status     =   Campaign::getStatus();
        $users      =   User::select(DB::raw("CONCAT(firstname,' ',name) AS name"),'id')
                        ->Notdeleted()
                        ->orderBy('firstname' , 'ASC')
                        ->pluck('name' , 'id')
                        ->toArray();
        $channels   =   Channel::Notdeleted()
                        ->orderBy('name' , 'ASC')
                        ->pluck('name' , 'id')
                        ->toArray();
        $channels[0]=   'sélectionnez';
        ksort($channels);
        $services= Service::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();

        return view('campaigns.show' , compact('campaign' , 'status' , 'users' , 'channels' , 'campaignChannelIndicator' , 'services'));
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
        // Update de la campagne
        $campaign = Campaign::findOrFail($id);
        $campaign->update( $request->except('channel' , 'indicator' , 'add-new-channel' , 'states') );

        // Sync campaign_channel (create, update, delete)
        $channelDatas           = $request->only('channel');
        $freshCampaignChannel   = CampaignChannel::saveCampaignChannel($channelDatas['channel']);
        CampaignChannel::deleteCampaignChannel($freshCampaignChannel,$id);

        // Sync campaign_channel_indicator (create, update, delete)
        $indicatorDatas          = $request->only('indicator');
        CampaignChannelIndicator::saveCampaignChannelIndicator($indicatorDatas['indicator']);
        
        // Consolidation results_state
        $results_state = Campaign::consilidationResults($campaign);
        $campaign->update( array('results_state' => $results_state) );

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


    /**
     * Add new campaign - to fix maybe later ?
     *
     * @return mixed
     */
    public function newcampaign()
    {
        $campaign = Campaign::create();
        return redirect(action('CampaignController@show' , $campaign));
    }


    /**
     * Duplicate campaign
     *
     * @return mixed
     */
    public function duplicatecampaign($id)
    {
        $campaign = Campaign::duplicateCampaign($id);
        return redirect(action('CampaignController@show' , $campaign))->with('success' , 'Votre campagne a bien été dupliquée');
    }



}
