<?php

namespace App;

use App\Library\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use Scopable;

    protected $guarded = array('id');

    /**
     * RELATIONSHIPS
     */

    // many to many
    public function campaigns() {
        return $this->belongsToMany('App\Campaign');
    }

    // 1 to many
    public function indicators() {
        return $this->hasMany('App\Indicator');
    }


    /**
     * OVERRIDE
     */

    // method override to instantiate custom pivot class
    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new CampaignChannelPivot($parent, $attributes, $table, $exists);
    }

}
