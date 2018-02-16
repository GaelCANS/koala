<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $guarded = array('id');


    /**
     * MUTATORS & ACCESSORS
     */
    public function getBeginshortAttribute() {
        return $this->begin != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $this->begin)->format('d/m/y') :
            '';
    }

    public function getEndshortAttribute() {
        return $this->end != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $this->end)->format('d/m/y') :
            '';
    }

    /*public function getBeginAttribute($begin) {
        return $begin != '0000-00-00' ? $begin : '';
    }

    public function getEndAttribute($end) {
        return $end != '0000-00-00' ? $end : '';
    }*/
}
