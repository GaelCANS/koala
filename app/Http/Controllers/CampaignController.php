<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignChannel;
use App\CampaignChannelIndicator;
use App\CampaignChannelPivot;
use App\Channel;
use App\Library\Features\Trello\TrelloCamp;
use App\Market;
use App\Need;
use App\Segment;
use App\Service;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class CampaignController extends Controller
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
        // Récupération des critères de filtre stockés en cookie
        $request = (object)Cookie::get('filter');

        // Chargement des campagnes
        $campaigns = Campaign::notdeleted()->savedOnly()->filter($request)->orderBy('campaigns.id' , 'DESC')->paginate(10);
        $campaigns->load('Channels');
        $campaigns->load('Markets');

        // Chargement des éléments de filtre
        $markets = Market::notdeleted()->orderBy('id', 'ASC')->get();
        $segments = Segment::notdeleted()->orderBy('id', 'ASC')->get();
        $services= Service::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $services[0]= 'Tous';
        ksort($services);
        $channels= Channel::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $channels[0]=   'Tous';
        ksort($channels);
        $users = User::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $users[0]=   'Tous';
        ksort($users);

        // Gestion des données de filtre stockées ou par défaut
        $results = array('success' => 'ajoutés' , 'warning' => 'partiels' , 'danger' => 'aucuns');
        if(!empty($request->results)) {
            $reload_results = array();
            foreach ($request->results as $result) {
                $key = array_search($result , $results);
                $reload_results[$key] = $result;
            }
        }
        $data = array(
            'services' => !empty($request->services) ? array_map('intval' , $request->services ) : array(0),
            'users'    => !empty($request->users) ? array_map('intval' , $request->users ) : array(0),
            'channels' => !empty($request->channels) ? array_map('intval' , $request->channels ) : array(0),
            'markets'  => !empty($request->markets) ? array_map('intval' , $request->markets ) : Market::notdeleted()->pluck('id')->toArray(),
            'segments' => !empty($request->segments) ? array_map('intval' , $request->segments ) : Segment::notdeleted()->pluck('id')->toArray(),
            'results'  => !empty($request->results) ? $reload_results : $results,
            'begin'    => !empty($request->begin) ? $request->begin : '',
            'end'      => !empty($request->end) ? $request->end : '',
            'keywords' => !empty($request->keywords) ? $request->keywords : '',
        );

        return view('campaigns.index' , compact('campaigns', 'markets' , 'services' , 'channels' , 'data' , 'results' , 'users', 'segments'));
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
        $campaign->load('Services');
        $campaign->Channels->load('Indicators');

        // Chargement des images associées
        $files = $campaign->images();

        // Chargement manuel des objectifs et résultats des indicateurs de la campagne
        $campaignChannelIndicator = CampaignChannelIndicator::loadCampaignChannelIndicator($campaign);

        // Chargement des données annexes utiles
        $status     =   Campaign::getStatus();
        $users      =   User::select(DB::raw("CONCAT(firstname,' ',name) AS name"),'id')
                        ->Notdeleted()
                        ->orderBy('firstname' , 'ASC')
                        ->pluck('name' , 'id')
                        ->toArray();

        $users_channels = $users;
        $users_channels[0] = "Expert";
        ksort($users_channels);

        $needs      =   Need::select('wording','id')
                        ->whereDeleted('0')
                        ->orderBy('wording' , 'ASC')
                        ->pluck('wording' , 'id')
                        ->toArray();

        $users_channels = $users;
        $users_channels[0] = "Expert";
        ksort($users_channels);

        $channels   =   Channel::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $channelInOrder["0"] = "Selectionnez";
        foreach ($channels as $key => $channel_name)
            $channelInOrder[(string)$key] = $channel_name;
        $channels = $channelInOrder;

        $services= Service::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        $markets = Market::Notdeleted()
            ->orderBy('id' , 'ASC')
            ->get();
        $segments = Segment::Notdeleted()
            ->orderBy('id' , 'ASC')
            ->get();


        return view('campaigns.show' , compact('campaign' , 'status' , 'users' , 'channels' , 'campaignChannelIndicator' , 'services', 'markets' , 'files','users_channels','segments' , 'needs'));
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
        $campaign->update( $request->except('channel' , 'indicator' , 'add-new-channel' , 'states' , 'services', 'markets', 'segments', 'needs' , 'users') );

        // Sync campaign_service
        $campaign->services()->sync( (array)$request->services );

        // Sync campaign_need
        $campaign->needs()->sync( (array)$request->needs );

        // Sync campaign_need
        $campaign->users()->sync( (array)$request->users );

        // Sync campaign_market
        $campaign->markets()->sync( (array)$request->markets );

        // Sync campaign_segment
        $campaign->segments()->sync( (array)$request->segments );

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


        // Trello Sync
        Campaign::updateTrello($id);


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

        // Trello Sync
        Campaign::deleteTrello($id);

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

        // Trello Sync
        Campaign::updateTrello($campaign->id);

        return redirect(action('CampaignController@show' , $campaign))->with('success' , 'Votre campagne a bien été dupliquée');
    }


    /**
     * Upload campaign
     *
     * @return mixed
     */
    public function upload(Requests\ImageRequest     $request)
    {
        $campaign = Campaign::findOrFail($request->input('campaign'));
        $campaign->upload($request->myfile);
        return redirect(action('CampaignController@show' , $campaign))->with('success' , 'Votre campagne a bien été dupliquée');
    }


    /**
     * Delete image
     *
     * @param Request $request
     */
    public function deleteImage(Request $request)
    {
        Campaign::deleteImage($request->img, $request->id);
    }


    /**
     * Save filter
     *
     * @param Request $request
     */
    public function filter(Request $request)
    {
        Cookie::queue('filter' , $request->all());
        return redirect(action('CampaignController@index'));
    }


    /**
     * Clear filter
     *
     * @param Request $request
     */
    public function clearfilter(Request $request)
    {
        \Cookie::queue(\Cookie::forget('filter'));
        return redirect(action('CampaignController@index'));
    }


    public function timeline($id)
    {
        // Chargement de la campagne et des tables associées
        $campaign   = Campaign::findOrFail($id);
        $campaign->load('relationCampaignChannels');
        $campaign->relationCampaignChannels->load('Channel');

        return view('campaigns.gantt' , compact('campaign'));
    }



}
