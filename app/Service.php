<?php

namespace App;

use App\Library\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use Scopable;
    protected $fillable = array('name' , 'delete' , 'disabled');


    public static function service_classname($className)
    {
        $service = self::select('id')->where(DB::raw('LOWER(REPLACE(name," ",""))'),'=',$className)->first();
        return $service->id > 0 ? $service->id : 0;
    }

    /**
     * RELATIONSHIPS
     */
    public function users() {
        return $this->hasMany('App\User');
    }

}
