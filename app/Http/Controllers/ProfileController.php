<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Error;

class ProfileController extends Controller
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

    public function show($id)
    {
        //
        error_log($id);
        $profile = Profile::where('user_id', $id)->first();
        return view('albums.index')->with('profile',$profile);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create() : View
    // {
    //     return view('products.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : RedirectResponse
    {
        $profile = Profile::where('user_id', $request->user_id)->first();
        if ($profile == "") {
            Profile::create($request->all());
            return redirect()->route('myalbum')
                            ->withSuccess('New profile is added successfully.');
        }else{
            $profile->job = $request->job;
            $profile->des = $request->des;
            $profile->update();
            return redirect()->route('myalbum')
                            ->withSuccess('New profile is added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $product
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $product
     * @return \Illuminate\Http\Response
     */
    // public function edit(Profile $product) : View
    // {
    //     //
    //     return view('products.edit', [
    //         'product' => $product
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateProductRequest $request, Profile $product) : RedirectResponse
    // {
    //     //
    //     $product->update($request->all());
    //     return redirect()->back()
    //                     ->withSuccess('Profile is updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $product
     * @return \Illuminate\Http\Response
     */
    public function allow($id)
    {
        $user = Profile::find($id);
        $user->useflag = !$user->useflag;
        $user->update();

        return redirect()
                ->back()
                ->with('info', 'Profile deleted successfully');
    }

    public function delete($id)
    {
        error_log("-->>>");
        $user = Profile::find($id);
        $user->delete();

        return redirect()
                ->back()
                ->with('info', 'Profile deleted successfully');
    }
}
