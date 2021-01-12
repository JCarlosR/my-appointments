<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
    	$user = auth()->user();
    	return view('profile', compact('user')); // $user
    }

    public function update(Request $request)
    {
    	$user = auth()->user();
    	$user->name = $request->name; // $request->input('name')
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->save();

    	$notification = 'Los datos han sido actualizados satisfactoriamente.';
    	return back()->with(compact('notification')); // session('notification')
    }
}
