<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use App\Indicator;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class ChannelController extends Controller
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
        return redirect(action('ChannelController@show', $channel->id))->with('success' , "Le canal {$channel->name} a bien été créé.");

        //return view( 'channels.show', compact('channel'))->with('success' , "Le canal a bien été créé.");
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

        // $request->all();
        // $request->only('indicator');
        // Mise à jour du channel


      $channel = Channel::findOrfail($id);
      //dd($request->all());
      $channel->update($request->only('name','class_name' ));

      // Mise à jour des indicateurs existants
        if (is_array($request->input('indicator')) && count($request->input('indicator'))>0){
            foreach($request->input('indicator') as $indicator_id => $indicator){

                $indic = Indicator::findOrfail($indicator_id);
                 //var_dump($indic);
                // dd($indicator);
                $indic->update( $indicator );

          }
        }


      // Ajout des indicateurs
        if (is_array($request->input('new_indicator')) && count($request->input('new_indicator'))>0){
                $type_new = $request->input('new_type');
                //dd($request->input('new_indicator'));
                foreach($request->input('new_indicator') as $new_id => $new_indic){
                   //dd($type_new[$new_id]);
                   if ($new_indic !="") {
                       $ajout_indic = Indicator::create(array('name' => $new_indic, 'type' => $type_new[$new_id],  'channel_id' => $request->channel_id));
                   }
                };
         }


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

    public function showglossaire($id)
    {
       $channel = Channel::findOrfail($id);
       return view('channels.glossaire', compact('channel'));
    }

    public function updateGlossary(Requests\ChannelRequest $request, $id)
    {
        // $request->all();
        // $request->only('indicator');
        // Mise à jour du channel - onglet glossaire
        //dd($request);
        $channel = Channel::findOrfail($id);
        $channel->update($request->only('description','format' ));


        return redirect()->back()->with('success' , "Le glossaire lié au canal vient d'être mis à jour");
    }
}
