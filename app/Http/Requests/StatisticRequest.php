<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StatisticRequest extends Request
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
            'begin'     => 'required|date_format:d/m/Y',
            'end'       => 'required|date_format:d/m/Y',
            'markets'   => 'array',
            'users'     => 'array'
        );
    }
}
