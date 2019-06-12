<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use Illuminate\Support\Facades\URL;

class TagController extends Controller
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
        $tags = Tag::orderBy('name')->get();
        return view ('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = null;
        return view('tags.show' , compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = Tag::create( $request->only('name') );
        return redirect(action('TagController@index'))->with('success' , "Le tag {$tag->name} a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.show', compact('tag'));
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
    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->update( $request->all() );
        return redirect()->back()->with('success' , "Le tag vient d'être mis à jour");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return redirect(URL::previous())->with('success' , 'Le tag a bien été supprimé');
    }

    public function channels($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->load('Channels');
        $id_channels = $tag->channels->pluck('id')->toArray();
        $channels = Channel::notdeleted()->orderBy('name')->get();
        return view('tags.associate', compact('tag','channels','id_channels'));
    }

    public function associate(Request $request,$id)
    {
        $tag = Tag::findOrFail($id);
        $tag->channels()->sync($request->input('channel'));
        return redirect(URL::previous())->with('success' , 'Les canaux ont bien été associés');
    }
}
