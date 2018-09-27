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
        'name', 'email', 'password', 'firstname', 'cmm', 'admin', 'services_id' , 'delete'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


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
        
        return 'avatar_'.substr(md5($id.'avatar'),0,6);
    }


    public static function UsersCmm()
    {
        $users = User::where('cmm' , '1')->Notdeleted()->get();
        $animates = array();
        foreach ($users as $user) {
            $animates[] = $user->firstname;
        }
        return implode(' et ' , $animates);
    }




    /**
     * MUTATORS & ACCESSORS
     */
    public function getFirstnameInitialAttribute() {
        return $this->firstname." ".substr($this->name, 0, 1).".";
    }


    public function getFullnameAttribute() {
        return $this->firstname." ".$this->name;
    }



    /**
     * RELATIONSHIPS
     */
    public function services() {
        return $this->belongsTo('App\Service');
    }
    


}
