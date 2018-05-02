<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $channels = Channel::notdeleted()->orderBy('name')->get();
       return view('channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channel = null;
        return view('channels.show', compact('channel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ChannelRequest $request)
    {
        $channel = Channel::create( $request ->only('name','class_name') );
        return redirect(action('ChannelController@index'))->with('success' , "Le canal {$channel->name} a bien été créé.");
        //return view('channels.index')

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $channel = Channel::with( array('indicators'=> function($query){
          $query->where('indicators.delete','0');
      }))->where('channels.id',$id)->first();



      return view( 'channels.show', compact('channel'));
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
     * @param  \Illuminate\Http\Request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ChannelRequest $request, $id)
    {
      $channel = Channel::findOrfail($id);
      $channel->update( $request -> all());
      return redirect()->back()->with('success' , "Le canal vient d'être mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel = Channel::findOrfail($id);
        $channel->update(array('delete' => '1'));
        return redirect(URL::previous())->with('success' , 'Le canal a bien été supprimé');

    }
}
