<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\CampaignChannel;
use App\CampaignChannelIndicator;
use App\Channel;
use App\User;
use App\Indicator;
use App\Library\Features\Trello\TrelloCamp;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class CampaignchannelController extends Controller
{

    public function add($id, $selected) {

        // Load current campaign and channel
        $campaign           = Campaign::findOrFail($id);
        $channelModel       = Channel::findOrFail($selected);
        $channelModel->load('Indicators');

        // Create CampaignChannel
        $channel            = CampaignChannel::create(
            array(
                'campaign_id' => $campaign->id ,
                'channel_id' => $channelModel->id ,
                'uniqid' => uniqid()
            )
        );

        // Create Indicators if exists
        if ($channelModel->Indicators) {
            foreach ($channelModel->Indicators as $indicator) {
                
                if (!$indicator->delete) {
                    CampaignChannelIndicator::create(
                        array(
                            'campaign_channel_id' => $channel->id,
                            'indicator_id' => $indicator->id,
                            'uniqid' => uniqid()
                        )
                    );
                }

            }
            $channel->load('campaignChannelIndicators');
        }

        $users      =   User::select(DB::raw("CONCAT(firstname,' ',name) AS name"),'id')
            ->Notdeleted()
            ->orderBy('firstname' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();

        $users_channels = $users;
        $users_channels[0] = "Expert";
        ksort($users_channels);

        // Instanciate channels
        $channels   =   Channel::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();

        // Consolidation results_state
        $results_state = Campaign::consilidationResults($campaign);
        $campaign->update( array('results_state' => $results_state) );

        $type = 'from-ajax';

        $html = view('campaignchannels.channels' , compact('campaign' , 'channel' , 'channels' , 'type', 'users_channels' ))->render();

        return response()->json(
            array(
                'added'     => 1,
                'html'      => $html,
                'new'       => $channel->uniqid
            )
        );

    }


    /**
     * Duplicate campaignChannel and campaignChannelIndicators associate
     *
     * @param $id
     * @param $channelUniqid
     * @return mixed
     */
    public function duplicate($id, $channelUniqid)
    {
        // Load current campaign and campaignChannel
        $campaign           = Campaign::findOrFail($id);
        $campaignChannel    = CampaignChannel::where('uniqid' , $channelUniqid)
                              ->where('campaign_id' , $campaign->id)
                              ->first();
        $campaignChannel->load('campaignChannelIndicators');

        // Create new campaignChannel
        $channel            = CampaignChannel::create(
            array(
                'campaign_id'   => $campaignChannel->campaign_id,
                'channel_id'    => $campaignChannel->channel_id,
                'comment'       => $campaignChannel->comment,
                'uniqid'        => uniqid()
            )
        );
        $channel->load('Channel');

        // If exist create new campaignChannelIndicators
        if ($campaignChannel->campaignChannelIndicators) {
            foreach ($campaignChannel->campaignChannelIndicators as $campaignChannelIndicator) {
                CampaignChannelIndicator::create(
                    array(
                        'campaign_channel_id'   => $channel->id,
                        'indicator_id'          => $campaignChannelIndicator->indicator_id,
                        'goal'                  => $campaignChannelIndicator->goal,
                        'result'                => $campaignChannelIndicator->result,
                        'uniqid'                => uniqid()
                    )
                );
            }
            $channel->load('campaignChannelIndicators');
            $channel->campaignChannelIndicators->load('Indicator');
        }


        // Instanciate channels
        $channels   =   Channel::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();

        // Consolidation results_state
        $results_state = Campaign::consilidationResults($campaign);
        $campaign->update( array('results_state' => $results_state) );

        $type = 'from-ajax';

        $html = view('campaignchannels.channels' , compact('campaign' , 'channel' , 'channels' , 'type' ))->render();

        return response()->json(
            array(
                'duplicated'=> 1,
                'html'      => $html,
                'parent'    => $channelUniqid,
                'newItem'   => $channel->uniqid
            )
        );

    }
    
    
    /**
     * Remove the specified campaign_channel
     *
     * @param $id
     * @param $channelUniqid
     * @return mixed
     */
    public function destroy($id, $channelUniqid)
    {
        $campaign = Campaign::findOrFail($id);

        // Delete  campaign_channel and campaign_channel_indicator associate
        $campaignChannel = CampaignChannel::where('uniqid' , $channelUniqid)->where('campaign_id' , $campaign->id)->first();

        // Trello sync
        Campaign::deleteCard($campaignChannel->id);

        $isDeleted = $campaignChannel->delete();

        // Consolidation results_state
        $results_state = Campaign::consilidationResults($campaign);
        $campaign->update( array('results_state' => $results_state) );

        return json_encode(
            array(
                'deleted'   =>  $isDeleted,
                'id'        => 'channel-'.$channelUniqid,
                'error_msg' => 'Une erreur est survenue lors de la suppression de ce canal.'
            )
        );
    }


    /**
     * Update date for an event
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $campaignChannel = CampaignChannel::findOrFail($request->input('id'));
        $campaignChannel->preventMutator = true;
        $campaignChannel->update($request->only('begin' , 'end'));

        // Update on Trello
        Campaign::updateCard($campaignChannel->id);

        return response()->json([
            'state' => '1'
        ]);
    }
    
}
