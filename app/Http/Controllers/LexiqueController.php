<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

use App\Http\Requests;
use Illuminate\Support\Facades\URL;

class LexiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::notdeleted()->orderBy('name')->get();
        return view('lexique.index',compact('channels') );
    }

    public function detailLexique($id)
    {
      $channel = Channel::findOrfail($id);
      $html = view('lexique.detail-lexique' , compact('channel'))->render();
      if ($channel -> resource_link != ''){
          $image = asset( URL::to('/').'/storage/'.$channel->resource_link );
      }
      else {
          $image = asset( URL::to('/').'/storage/pasdephoto.jpg');
      }

        return response()->json([
            'html'  => $html,
            'image' => $image

        ]);

    }

}
