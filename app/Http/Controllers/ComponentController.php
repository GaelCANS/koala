<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class ComponentController extends Controller
{

    public function __construct( ){

        $this -> middleware('auth');
    }


    public function formbox( Request $request)
    {
        Mail::send('emails.formbox', array('user' => auth()->user()->fullname , 'request' => $request), function ($m) {
            $m->from('information@koala.com', 'Koala');
            $users = User::where('admin' , '1')->notdeleted()->get();

            if ($users) {
                foreach ($users as $user) {
                    $m->to($user->email)->subject( 'Requête utilisateur provenant de CAMP' );
                }
            }
        });

        return response()->json(
            array(
                'state'      => 1
            )
        );
    }
}
