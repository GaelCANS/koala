<?php

namespace App\Http\Controllers;

use App\Generator;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class GeneratorController extends Controller
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
        $generators = Generator::whereDeleted('0')->orderBy('wording')->get();
        return view('generators.index' , compact('generators') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generator = null;
        return view('generators.show' , compact('generator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\GeneratorRequest $request)
    {
        $generator = Generator::create( $request->only('wording') );
        return redirect(action('GeneratorController@index'))->with('success' , "L'outil de génération des leads {$generator->wording} a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $generator = Generator::findOrFail($id);
        return view('generators.show', compact('generator'));
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
    public function update(Requests\GeneratorRequest $request, $id)
    {
        $generator = Generator::findOrFail($id);
        $generator->update( $request->all() );
        return redirect()->back()->with('success' , "L'outil de génération des leads vient d'être mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $generator = Generator::findOrFail($id);
        $generator->update( array('deleted' => '1') );
        return redirect(URL::previous())->with('success' , 'L\'outil de génération des leads a bien été supprimé');
    }
}
