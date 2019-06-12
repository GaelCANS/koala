<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');


    // many to many
    public function channels()
    {
        return $this->belongsToMany('App\Channel');
    }
}
