<?php

namespace App;

use App\Library\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use Scopable;

    protected $fillable = array('name' , 'abbreviation' , 'delete' , 'class_css');


}
