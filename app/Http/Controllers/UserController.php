<?php

namespace App\Http\Controllers;

use App\Service;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct( ){

        $this -> middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // Control on admin user
        if (!auth()->user()->admin && $id != auth()->user()->id ) {
            return redirect()->route('dashboard-index');
        }

        $user = User::findOrFail($id);
        $services= Service::Notdeleted()
            ->orderBy('name' , 'ASC')
            ->pluck('name' , 'id')
            ->toArray();
        return view('users.show' , compact('user' , 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UserRequest $request, $id)
    {
        // Update user standard fiels
        $user = User::findOrFail($id);
        $user->update($request->except('email' , 'password'));

        // Update user's password
        if (trim($request->password) != '') {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        // Upload avatar
        if (!empty($request->avatar)) {
            $file_name = User::uploadAvatar($request->avatar , $id);
            $user->avatar = $file_name ? $file_name : '';
            $user->save();
        }

        return redirect()->back()->with('success' , "Le profil vient d'être mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
