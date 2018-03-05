<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::notdeleted()->orderBy('name')->get();
        return view('markets.index' , compact('markets') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $market = null;
        return view('markets.show' , compact('market'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\MarketRequest $request)
    {
        $market = Market::create( $request->only('name' , 'abbreviation', 'class_css') );
        return redirect(action('MarketController@index'))->with('success' , "Le marché {$market->name} a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $market = Market::findOrFail($id);
       return view('markets.show', compact('market'));
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
    public function update(Requests\MarketRequest $request, $id)
    {
        $market = Market::findOrFail($id);
        $market->update( $request->all() );
        return redirect()->back()->with('success' , "Le marché vient d'être mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $market = Market::findOrFail($id);
        $market->update( array('delete' => '1') );
        //redirect()->back()->with('success' , "Le marché vient d'être mis à jour");
        return redirect(URL::previous())->with('success' , 'Le marché a bien été supprimé');
    }
}
