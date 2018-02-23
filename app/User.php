<?php

namespace App;

use App\Library\Traits\Scopable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Scopable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];





    /**
     * MUTATORS & ACCESSORS
     */
    public function getFirstnameInitialAttribute() {
        return $this->firstname." ".substr($this->name, 0, 1).".";
    }

}
