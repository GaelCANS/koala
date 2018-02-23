<?php

namespace App;

use App\Library\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Scopable;
    protected $fillable = array('name' , 'delete' , 'disabled');

}
