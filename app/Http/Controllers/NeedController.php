<?php

namespace App\Http\Controllers;

use App\Need;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class NeedController extends Controller
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
        $needs = Need::whereDeleted('0')->orderBy('wording')->get();
        return view('needs.index' , compact('needs') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $need = null;
        return view('needs.show' , compact('need'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\NeedRequest $request)
    {
        $need = Need::create( $request->only('wording') );
        return redirect(action('NeedController@index'))->with('success' , "L'univers de besoin {$need->wording} a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $need = Need::findOrFail($id);
        return view('needs.show', compact('need'));
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
    public function update(Requests\NeedRequest $request, $id)
    {
        $need = Need::findOrFail($id);
        $need->update( $request->all() );
        return redirect()->back()->with('success' , "L'univers de besoin vient d'être mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $need = Need::findOrFail($id);
        $need->update( array('deleted' => '1') );
        return redirect(URL::previous())->with('success' , 'L\'univers de besoin a bien été supprimé');
    }
}
