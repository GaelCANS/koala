<?php

namespace App\Http\Controllers;

use App\Indicator;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndicatorController extends Controller
{
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
    public function store(Requests\IndicatorRequest $request)
    {

       if (is_array($request->name)) {
           foreach ($request->name as $indicator_id => $indicateur_valeur) {
               if ($indicator_id > 0){
                   $indicator = Indicator::findOrFail($indicator_id);
                   $indicator->update(array('name'=>$indicateur_valeur));
               }
               else {
                   if (trim($indicateur_valeur) != '') {
                       $indicator = Indicator::create(array('name' => $indicateur_valeur, 'channel_id' => $request->channel_id));
                   }
               }
           }
       }
      // $indicator = Indicator::create($request->all());
       return  redirect()->back()->with('success',"Les indicateurs ont été mis à jour.");

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
    public function update(Requests\IndicatorRequest $request, $id)
    {

        $indicator = Indicator::findOrfail($id);
        $indicator->update($request->only('name'));
        return redirect()->back()->with('success', 'Mise à jour de l\'indicateur réussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicator = Indicator::findOrfail($id);
        $indicator->update(array('delete'=>1));
        return response()->json(
            array(
                'id' => $id
            )
        );
    }
}
