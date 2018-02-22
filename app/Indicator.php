<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    /**
     * RELATIONSHIPS
     */

    // one to many
    public function campaignChannelIndicators() {
        return $this->hasMany('App\CampaignChannelIndicator');
    }
}
