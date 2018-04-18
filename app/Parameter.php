<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{

    public static function objectCmm($lib = '')
    {
        if ($lib == '')
            $params = self::where('category' , 'cmm')->get();
        else {
            $params = self::where('category', 'cmm')->where('name', trim($lib))->first();
            return (object)array( $params->name => $params->value );
        }
        $obj    =  null;
        foreach ($params as $param) {
            $obj[$param->name] = $param->value;
        }
        return (object)$obj;

    }


    public static function getDateCmm()
    {
        $cmm = self::objectCmm('date');
        return Carbon::createFromFormat('d/m/Y', $cmm->date)->format('Y-m-d');
    }


    public static function CmmDateShort()
    {
        $cmm = self::objectCmm('date');
        return Carbon::createFromFormat('d/m/Y', $cmm->date)->format('d/m');
    }


    public static function CmmTime()
    {
        $cmm = self::objectCmm('time');
        return $cmm->time;
    }


    public static function CmmWhere()
    {
        $cmm = self::objectCmm('where');
        return $cmm->where;
    }


    public static function lastDateCmm()
    {
        return Campaign::select('cmm_display')
            ->distinct()
            ->CmmValidation()
            ->where('cmm_display' , '!=' , '0000-00-00')
            ->orderBy('cmm_display' , 'DESC')
            ->pluck('cmm_display')
            ->take(1)
            ->first();
    }


}
