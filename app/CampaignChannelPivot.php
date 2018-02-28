<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CampaignChannelPivot extends Pivot
{

    protected $guarded = array('id');


    /**
     * MUTATORS & ACCESSORS - see CampaignChannel for the set function
     */
    public function getBeginAttribute($date)
    {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y') :
            '';
    }

    public function getEndAttribute($date)
    {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/Y') :
            '';
    }

    

}
