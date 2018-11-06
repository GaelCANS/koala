<?php
/**
 * Created by PhpStorm.
 * User: gaellevant
 * Date: 26/10/2018
 * Time: 11:21
 */

namespace App\Library\Features\Trello;


use App\Campaign;
use App\CampaignChannel;
use App\Channel;
use App\Parameter;

class TrelloCamp
{

    /**
     * @var TrelloApi
     * Object TrelloAPi
     */
    private $trello;

    /**
     * TrelloCamp constructor.
     * @param bool $debug
     */
    public function __construct($debug = false)
    {
        $this->trello = new TrelloApi($debug);
    }

    /**
     * Save (create or update) new card
     * @param $campaignChannel_id int
     */
    public function saveChannel($campaignChannel_id)
    {
        $campaignChannel = CampaignChannel::findOrFail($campaignChannel_id);
        
        // If same channel is already create for this campaign, we must create a checklist in the card
        if ($this->channelExists($campaignChannel)) {
            $this->updateCard($campaignChannel);
        }
        // If this channel is the first for this channel, we must create a new card
        else {
            $this->createCard($campaignChannel);
        }
    }


    /**
     * Test if a card channel exists
     *
     * @param $campaignChannel object
     * @return bool
     */
    private function channelExists($campaignChannel)
    {
        return trim($campaignChannel->trello_cardId) == '' ? false : true;
    }

    /**
     * Return if a campaignChannel is already finish
     *
     * @param $campaignChannel object
     * @return boolean
     */
    private function isPast($campaignChannel)
    {
        return $campaignChannel->isFinish;
    }

    /**
     * Add a card in trello
     *
     * @param $campaignChannel object
     */
    private function createCard($campaignChannel)
    {
        if ($this->isPast($campaignChannel)) return ;

        $card_id  = $this->trello->addCard(
            $this->getColumnId($campaignChannel->channel_id),
            $this->getParams($campaignChannel)
        );
        $this->setTrelloId( array('trello_cardId' => $card_id->id),$campaignChannel );
    }

    /**
     * Update a card in trello
     *
     * @param $campaignChannel object
     */
    private function updateCard($campaignChannel)
    {

        $card = $this->trello->updateCard(
            $campaignChannel->trello_cardId,
            $this->getParams($campaignChannel)
        );
    }

    /**
     * Returns params for save a card
     *
     * @param $campaignChannel object
     * @return array
     */
    private function getParams($campaignChannel)
    {
        $campaign = Campaign::findOrFail($campaignChannel->campaign_id);
        $params = array(
            'name' => $this->getMarkets($campaignChannel->channel_id, $campaignChannel->campaign_id).' '.$campaign->name ,
            "desc" => $this->commentTrello($campaignChannel,$campaign),
            "due"  => ""
        );
        if ($campaignChannel->end != '0000-00-00') {
            $params['due'] = $campaignChannel->begin;
        }
        return $params;
    }

    /**
     * Returns market in a string
     *
     * @param $channel_id ID
     * @param $campaign_id ID
     * @return string
     */
    private function getMarkets($channel_id,$campaign_id)
    {

        switch ($channel_id) {

            // Bannières part
            case Parameter::getParameter('channel_banniere' , 'trello'):
                return '[PART]';
                break;
            // Bannières agri
            case Parameter::getParameter('channel_banniere_agri' , 'trello'):
                return '[AGRI]';
                break;
            // Bannières BP
            case Parameter::getParameter('channel_banniere_bp' , 'trello'):
                return '[BP]';
                break;
            // Bannières pro
            case Parameter::getParameter('channel_banniere_pro' , 'trello'):
                return '[PRO]';
                break;
            default:
                $str = '';
                $campaign = Campaign::FindOrFail($campaign_id);
                $campaign->load('Markets');
                $markets = $campaign->markets;
                $marketArr = array();
                if ($markets) {
                    foreach ($markets as $market) {
                        $marketArr[] = '['.$market->abbreviation.']';
                    }
                    $str .= implode(' ' , $marketArr);
                }
                return $str;
                break;
        }

    }

    /**
     * Returns comment in a string
     *
     * @param $campaignChannel object
     * @param $campaign object
     * @return string
     */
    private function commentTrello($campaignChannel , $campaign)
    {
        $comment = $campaignChannel->comment;
        $comment .= "\n\r";
        $comment .= "\n\r";
        $comment .= "-- -- -- -- -- -- -- -- -- -- -- --";
        $comment .= "\n\r";
        $comment .= "\n\r";

        $campaign->load('User');
        $comment .= "\n\r";
        $comment .= ":bust_in_silhouette: Responsable campagne : ".$campaign->user->fullname;

        $comment .= "\n\r";
        $comment .= ":calendar: Période de campagne : ".$campaignChannel->begin." :heavy_minus_sign: ".$campaignChannel->end;

        if ($campaign->resource_link) {
            $comment .= "\n\r";
            $comment .= ":art: Ressources : " . $campaign->resource_link;
        }

        return $comment;
    }

    /**
     * Delete card in trello
     *
     * @param $campaignChannel_id int
     */
    public function deleteCard($campaignChannel_id)
    {
        $campaignChannel = CampaignChannel::findOrFail($campaignChannel_id);
        $this->trello->deleteCard($campaignChannel->trello_cardId);
    }

    /**
     * Return Trello column ID
     *
     * @param $channel_id int
     * @return string
     */
    private function getColumnId($channel_id)
    {
        $channel = Channel::findOrFail($channel_id);
        return $channel->trello_listId;
    }

    /**
     * Update campaign_channel DB Trello
     *
     * @param $trelloIds array
     * @param $campaignChannel object
     */
    private function setTrelloId($trelloIds,$campaignChannel)
    {
        $campaignChannel->update($trelloIds);
    }

}