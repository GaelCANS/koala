<?php

namespace App\Http\Controllers;

use App\Segment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class SegmentController extends Controller
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
        $segments = Segment::notdeleted()->orderBy('name')->get();
        return view('segments.index' , compact('segments') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $segment = null;
        return view('segments.show' , compact('segment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\SegmentRequest $request)
    {
        $segment = Segment::create( $request->only('name' , 'abbreviation', 'class_css') );
        return redirect(action('SegmentController@index'))->with('success' , "Le segment {$segment->name} a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $segment = Segment::findOrFail($id);
        return view('segments.show', compact('segment'));
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
    public function update(Requests\SegmentRequest $request, $id)
    {
        $segment = Segment::findOrFail($id);
        $segment->update( $request->all() );
        return redirect()->back()->with('success' , "Le segment vient d'être mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $segment = Segment::findOrFail($id);
        $segment->update( array('delete' => '1') );
        //redirect()->back()->with('success' , "Le marché vient d'être mis à jour");
        return redirect(URL::previous())->with('success' , 'Le segment a bien été supprimé');
    }
}
