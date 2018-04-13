<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $return = array(
            'name'          => 'required|string',
            'firstname'     => 'required|string',
            'services_id'   => 'required|exists:services,id',
            'password'      => 'min:6|confirmed',
            'avatar'        => 'image|mimes:jpeg,png,jpg,gif'
        );

        if ($this->input('email') != null) {
            $return['email']    = 'required|email';
            $return['password'] = 'required|min:6|confirmed';
        }

        return $return;
    }
}
