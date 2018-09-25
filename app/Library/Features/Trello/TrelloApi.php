<?php
/**
 * Created by PhpStorm.
 * User: gaellevant
 * Date: 30/04/2018
 * Time: 17:03
 */

namespace App\Library\Features\Trello;


class TrelloApi
{

    /**
     * @var string
     * API Key
     */
    private $apiKey = '';


    /**
     * @var string
     * API Token (secret)
     */
    private $apiToken = '';


    /**
     * @var string
     * base URL for use the API
     */
    private $apiUrl = '';

    /**
     * @var resource
     * curl resource
     */
    private $curl = null;

    /**
     * @var bool
     * debug mode (to print URL)
     */
    private $debug = false;


    /**
     * TrelloApi constructor.
     * @param bool $debug
     */
    public function __construct($debug=false)
    {
        $this->apiKey   = env('TRELLO_API_KEY');
        $this->apiToken = env('TRELLO_TOKEN');
        $this->apiUrl   = env('TRELLO_URL');
        $this->curl     = curl_init();
        $this->debug    = $debug;
    }


    /**
     * Return board informations
     *
     * @param $boardId string
     * @return array
     */
    public function getBoard($boardId)
    {
        $url = $this->apiUrl."/boards/".$boardId."?fields=id,name,idOrganization,dateLastActivity&lists=open&list_fields=id,name&";
        return $this->execute($url , 'POST');
    }


    /**
     * Add card in list
     *
     * @param $listId string
     * @param $cardInfos array
     * @return array
     */
    public function addCard($listId, $cardInfos)
    {
        $url = $this->apiUrl."/cards?name=".urlencode($cardInfos['name'])."&desc=".urlencode($cardInfos['desc'])."&due=".$cardInfos['due']."&idList=".$listId."&keepFromSource=all&";
        return $this->execute($url , 'POST');
    }


    /**
     * Add checklist in card
     *
     * @param $cardId string
     * @param $name string
     * @return array
     */
    public function addChecklist($cardId, $name)
    {
        $url = $this->apiUrl."/cards/".$cardId."/checklists?name=".urlencode($name)."&";
        return $this->execute($url , 'POST');
    }


    /**
     * Add comment in card
     *
     * @param $cardId string
     * @param $comment string
     * @return array
     */
    public function addComment($cardId, $comment)
    {
        $url = $this->apiUrl."/cards/".$cardId."/actions/comments?text=".urlencode($comment)."&";
        return $this->execute($url , 'POST');
    }


    /**
     * Add item in checklist
     *
     * @param $checklistId string
     * @param $name string
     * @return array
     */
    public function addItem($checklistId, $name)
    {
        $url = $this->apiUrl."/checklists/".$checklistId."/checkItems?name=".urlencode($name)."&pos=bottom&";
        return $this->execute($url , 'POST');
    }


    /**
     * Delete item in checklist
     *
     * @param $checklistId string
     * @param $checklistItemId string
     * @return array
     */
    public function deleteItem($checklistId, $checklistItemId)
    {
        $url = $this->apiUrl."/checklists/".$checklistId."/checkItems/".$checklistItemId."?";
        return $this->execute($url , 'DELETE');
    }


    /**
     * Del checklist in card
     *
     * @param $cardId string
     * @param $checkListId string
     * @return array
     */
    public function deleteChecklist($cardId, $checkListId)
    {
        $url = $this->apiUrl."/cards/".$cardId."/checklists/".$checkListId."?";
        return $this->execute($url , 'DELETE');
    }


    /**
     * Update card
     *
     * @param $cardId string
     * @param $cardInfos array
     * @return array
     */
    public function updateCard($cardId, $cardInfos)
    {
        $url = $this->apiUrl."/cards/".$cardId."?name=".urlencode($cardInfos['name'])."&desc=".urlencode($cardInfos['desc'])."&due=".$cardInfos['due']."&keepFromSource=all&";
        return $this->execute($url , 'PUT');
    }

    /**
     * Remove card from list
     *
     * @param $cardId string
     * @return array
     */
    public function deleteCard($cardId)
    {
        $url = $this->apiUrl."/cards/".$cardId."?";
        return $this->execute($url , 'DELETE');
    }


    /**
     * Execute the CURL command
     *
     * @param $url string
     * @param $type string
     * @return array
     */
    private function execute($url , $type)
    {
        // Add credentials
        $url.=$this->credentials();

        // Debug Mode
        if ($this->debug) {
            dump($url);
        }

        curl_setopt($this->curl, CURLOPT_URL, $url);

        // Request TYPE (post, put, delete, ...)
        switch ($type) {
            case 'POST':
                curl_setopt($this->curl, CURLOPT_POST, 1);
                break;
            case 'GET':
                curl_setopt($this->curl, CURLOPT_HTTPGET, 1);
                break;
            case 'DELETE':
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            case 'PUT':
                curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
            case '':
                break;
        }
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($this->curl);
        curl_close($this->curl);

        return json_decode($output);
    }


    /**
     * Return credentials for URL
     *
     * @return string
     */
    private function credentials()
    {
        return "key=".$this->apiKey."&token=".$this->apiToken;
    }


    /**
     * Close CURL resource
     */
    public function close()
    {
        curl_close($this->curl);
    }

}