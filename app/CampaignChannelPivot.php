<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CampaignChannelPivot extends Pivot
{
    /**
     * MUTATORS & ACCESSORS
     */
    public function getBeginAttribute($date) {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/y') :
            '';
    }

    public function getEndAttribute($date) {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/y') :
            '';
    }

}
