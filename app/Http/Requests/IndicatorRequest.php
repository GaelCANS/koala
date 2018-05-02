<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndicatorRequest extends Request
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

        $rules = array();
        foreach ($this->input('name') as $item => $indicator){

            if ($item > 0 ) {
                $rules['name.' . $item] = 'required|string';
            }
            else {
                $rules['name.' . $item] = 'string';
            }



        }

        $rules['channel_id'] = 'required|exists:channels,id';

        return $rules;
        /*return array(
           // 'name'=>'required|string',
            //'channel_id'=>'required|exists:channels,id'
        );*/
    }
}
