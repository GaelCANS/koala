<?php

namespace App\Http\Controllers;

use App\Component;
use App\Parameter;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ComponentController extends Controller
{

    public function __construct( ){

        $this -> middleware('auth');
    }


    public function formbox( Request $request)
    {
        $name = Component::putFile( Component::convertBase64($request->capture) );

        Mail::send('emails.formbox', array('user' => auth()->user()->fullname , 'request' => $request , 'image' => $name), function ($m) use ($name) {
            $m->from(Parameter::getParameter('expeditor','common'), Parameter::getParameter('expeditor_name','common'));
            $m->attach(URL::to('/').'/storage/'.$name);
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
