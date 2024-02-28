<?php

namespace App\Http\Controllers;
use App\Share;
use Error;
use Illuminate\Http\Request;
use Share as GlobalShare;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Album;

class ShareController extends Controller
{

    public function index(){

    }

    public function store(Request $request){

        $request->validate([
            'album_id'=>'required',
            'crypted_id'=>'required',
        ]);

        $share = new Share();
        $share->album_id = $request->input('album_id');
        $share->share_link = $request->input('crypted_id');
        $share->save();

        echo "success";


        // return redirect('/myalbum')->with('success','Album created successfully');
    }

    public function show($sharelink){
        
        $key = DB::select('SELECT album_id FROM shares WHERE share_link = ?', [$sharelink]);
        $album = Album::with('Photos')->find($key[0]->album_id);
        return view('albums.share')->with('album',$album);
    }
}
