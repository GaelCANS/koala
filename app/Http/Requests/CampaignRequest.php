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
        return array(
            "name"          => "required|string|min:2",
            "description"   => "string",
            "begin"         => "date_format:Y-m-d",
            "end"           => "date_format:Y-m-d",
            "cmm"           => "required|boolean"
        );
    }
}