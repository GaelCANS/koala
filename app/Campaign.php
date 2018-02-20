<?php

namespace App;

use App\Library\Traits\Scopable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use Scopable;

    protected $guarded = array('id');


    /**
     * MUTATORS & ACCESSORS
     */
    public function getBeginshortAttribute() {
        return $this->begin != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $this->begin)->format('d/m/y') :
            '';
    }

    public function getBeginAttribute($date) {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/y') :
            '';
    }

    public function getEndshortAttribute() {
        return $this->end != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $this->end)->format('d/m/y') :
            '';
    }

    public function getEndAttribute($date) {
        return $date != '0000-00-00' ?
            Carbon::createFromFormat('Y-m-d', $date)->format('d/m/y') :
            '';
    }




    /**
     * CUSTOMS
     */
    public static function getStatus() {
        return array('brouillon' , 'publiée');
    }


    /**
     * RELATIONSHIPS
     */

    // many to many
    public function channels() {
        return $this->belongsToMany('App\Channel')->withPivot('id' , 'comment' , 'begin' , 'end' , 'uniqid' );
    }


    /**
     * OVERRIDE
     */

    // method override to instantiate custom pivot class
    public function newPivot(Model $parent, array $attributes, $table, $exists) {
        return new CampaignChannelPivot($parent, $attributes, $table, $exists);
    }
}
