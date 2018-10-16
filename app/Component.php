<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Component extends Model
{

    public static function convertBase64($base64)
    {
        list($type, $base64) = explode(';', $base64);
        list(, $base64)      = explode(',', $base64);
        return base64_decode($base64);
    }


    public static function putFile($image)
    {
        $name = auth()->user()->name.'-'.time().'.png';
        Storage::disk('public')->put($name, $image);
        return $name;
    }
}
