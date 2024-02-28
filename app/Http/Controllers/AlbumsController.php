<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Profile;
use Illuminate\Support\Facades\Auth; // Import the Auth facade


class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->name == "admin")
            $albums = Album::all();
        else 
            $albums = Album::where('user_id', $user->id)->get();

        return view('albums.index')->with(['albums' => $albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cover_image'=>'required|file|mimes:jpeg,jpg,png|max:2048'
        ]);

        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('cover_image')->getClientOriginalExtension();
        $filenameToStore = $filename . '_' . time() . '.' . $ext;

        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers',$filenameToStore);

        $description = "";
        if($request->input('description') != null) $description = $request->input('description');

        $album = new Album;
        $album->name = $request->input('name');
        $album->cover_image = $filenameToStore;
        $album->user_id = $request->input('user_id');
        $album->description = $description;
        $album->save();
        return redirect('/myalbum')->with('success','Album created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('albums.show')->with('album',$album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
        $album = Album::find($id);
        $album->delete();

        return redirect()
                ->back()
                ->with('info', 'Album deleted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
