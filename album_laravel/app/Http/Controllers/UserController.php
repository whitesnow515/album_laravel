<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        //
        return view('users.index', [
            'users' => User::latest()->paginate(9)
        ]);
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
        //
        User::create($request->all());
        return redirect()->route('products.index')
                        ->withSuccess('New product is added successfully.');

    }

    public function update(Request $request) : RedirectResponse
    {
        //
        $user = User::find($request->input('user_id'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect()
                ->back()
                ->with('info', 'User updated successfully');

    }

    public function changePw(Request $request)
    {
        //
        $user = User::find($request->input('user_id'));
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);
        if (!Hash::check($request->input('current-password'), $user->password)) {
            $validator->errors()->add('current-password', 'The current password is incorrect.');
            echo "Please enter current-password correctly!";
            return;
        }
        if ($validator->fails()) {
            echo "Please enter new-password correctly!";
            return;
        }
        error_log($request->input('user_id'));
        $user->password = Hash::make($request->input('password'));
        $user->update();
        
        echo "success";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) : View
    {
        //
        return view('users.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    // public function edit(User $product) : View
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
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateProductRequest $request, User $product) : RedirectResponse
    // {
    //     //
    //     $product->update($request->all());
    //     return redirect()->back()
    //                     ->withSuccess('User is updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $product
     * @return \Illuminate\Http\Response
     */
    public function allow($id)
    {
        $user = User::find($id);
        $user->useflag = !$user->useflag;
        $user->update();

        return redirect()
                ->back()
                ->with('info', 'User deleted successfully');
    }

    public function delete($id)
    {
        error_log("-->>>");
        $user = User::find($id);
        $user->delete();

        return redirect()
                ->back()
                ->with('info', 'User deleted successfully');
    }
}
