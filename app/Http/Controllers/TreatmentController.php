<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class TreatmentController extends Controller
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
        $treatments = Treatment::whereDeleted('0')->orderBy('wording')->get();
        return view('treatments.index' , compact('treatments') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treatment = null;
        return view('treatments.show' , compact('treatment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TreatmentRequest $request)
    {
        $treatment = Treatment::create( $request->only('wording') );
        return redirect(action('TreatmentController@index'))->with('success' , "L'outil de traitement des leads {$treatment->wording} a bien été crée.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $treatment = Treatment::findOrFail($id);
        return view('treatments.show', compact('treatment'));
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
    public function update(Requests\TreatmentRequest $request, $id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->update( $request->all() );
        return redirect()->back()->with('success' , "L'outil de traitement des leads vient d'être mis à jour");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->update( array('deleted' => '1') );
        return redirect(URL::previous())->with('success' , 'L\'outil de traitement des leads a bien été supprimé');
    }
}
