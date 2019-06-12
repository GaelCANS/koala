<?php

namespace App\Http\Controllers;

use App\Tag;
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
        $channels->load('Tags');
        $tags = Tag::orderBy('name')->get();
        return view('lexique.index',compact('channels','tags') );
    }

    public function detailLexique($id)
    {
      $channel = Channel::findOrfail($id);
        $channel->load('Tags');
      $html = view('lexique.detail-lexique' , compact('channel', 'id_tags', 'tags'))->render();
      if ($channel -> resource_link != ''){
          $image = asset( URL::to('/').'/storage/'.$channel->resource_link );
      }
      else {
          $image = asset( URL::to('/').'/storage/nophoto.gif');
      }

        $channels = Channel::notdeleted()->orderBy('name')->get();

        return response()->json([
            'html'  => $html,
            'image' => $image

        ]);

    }

}
