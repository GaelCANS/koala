<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = array('name' , 'abbreviation' , 'delete' , 'class_css');
}
