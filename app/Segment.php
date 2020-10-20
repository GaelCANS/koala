<?php

namespace App;

use App\Library\Traits\Scopable;
use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{

    use Scopable;


    protected $guarded = [
        'id',
    ];
}
