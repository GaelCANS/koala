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

    public static function uploadAvatar($img , $id) {

        if (is_object($img) && $img->isValid()) {

            $name = self::nameAvatar($id).'.'.$img->getClientOriginalExtension();

            $dir = storage_path().'/app/public/';
            $img->move($dir , $name);

            return $name;
        }
        return false;
    }


    public static function nameAvatar($id) {

        return ('channel_'.$id);
    }

}
