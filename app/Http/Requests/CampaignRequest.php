<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CampaignRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Campaign's rules
        $rules = $this->campaignRules();

        // Channel's rules
        $channel = $this->channelRules();

        // Indicator's rules
        $indicator = $this->indicatorRules();

        return array_merge(
            $rules,
            $channel,
            $indicator
        );
    }

    /**
     * Return rules for campaign table
     * @return array
     */
    private function campaignRules()
    {
        return array(
            "name"              => "required|string|min:2",
            "saved"             => "required|in:1",
            "description"       => "string",
            "begin"             => "date_format:d/m/y",
            "end"               => "date_format:d/m/y",
            "cmm"               => "required|boolean",
            "unica"             => "string",
            "legal_validation"  => "in:oui,non,non concerné",
            //"status"        => "required|boolean",
            "status"            => "boolean",
            "user_id"           => "required|exists:users,id",
            "cmm_comments"      => "string",
            "results"           => "string",
            "resource_link"     => "string"
        );
    }


    /**
     * Return rules for campaign_channel table
     */
    private function channelRules()
    {
        $rules = array();
        if ($this->input('channel')!=null) {
            foreach ($this->input('channel') as $item => $channel) {
                $rules["channel.{$item}.channel_id"]    = array('required','exists:channels,id');
                if ($channel['user_id'] > 0) {
                    $rules["channel.{$item}.user_id"] = array('exists:users,id');
                }
                $rules["channel.{$item}.begin"]         = array('date_format:d/m/Y');
                $rules["channel.{$item}.end"]           = array('date_format:d/m/Y');
                $rules["channel.{$item}.comment"]       = array('string');
            }
        }

        return $rules;
    }


    /**
     * Return rules for campaign_channel_indicator table
     */
    private function indicatorRules()
    {
        $rules = array();

        if ($this->input('indicator')!=null) {
            foreach ($this->input('indicator') as $item => $indicator) {
                $rules["indicator.{$item}.id"]       = array('string');
                $rules["indicator.{$item}.goal"]     = array('numeric');
                $rules["indicator.{$item}.result"]   = array('numeric');
            }
        }

        return $rules;
    }

}
