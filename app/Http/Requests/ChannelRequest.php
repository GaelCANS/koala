<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChannelRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->all());
        if ($this->input('indicator')!=null){
            //dd($this->input('indicator'));
            foreach ($this->input('indicator') as $key => $value) {
                $rules["indicator.{$key}"]    = 'required|string';
            }
        }

        if ($this->input('new_indicator')!=null){
            //dd($this->input('new_indicator'));
            foreach ($this->input('new_indicator') as $item => $new_indic) {
                $rules["new_indicator.{$item}"]    = 'string';
            }
        }

        $rules['name'] = 'required|string';
        $rules['class_name'] = 'string';
        // 'name'=>'required|string',
        $rules['channel_id'] = 'required|exists:channels,id';
        $rules['description']= 'required|string';
        $rules['format']= 'string';


        return array();
        //return array(

       //);
    }
}