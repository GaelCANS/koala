<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Service;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
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
        $notifications = Notification::whereServiceId(Auth::user()->services_id)->orderBy('created_at','desc')->get();
        $notifications->load('Campaign');
        $last_notification = Auth::user()->notification;
        $user = User::findOrFail(Auth::user()->id);
        $user->update(array('notification'=>Carbon::now()));
        return view('notifications.index', compact('notifications','last_notification'));
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
        //
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
    public function update(Request $request)
    {
        $notification = Notification::findOrFail($request->input('notification'));
        $notification->update(array('done' => !$notification->done));
        return json_encode(
            array(
                'done' =>   $notification->done,
                'id' =>   $notification->id,
                'count_service' => count(Notification::lists_service(auth()->user()))
            )
        );
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
