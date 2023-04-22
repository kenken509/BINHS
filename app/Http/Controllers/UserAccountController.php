<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserAccountController extends Controller
{
    public function create(){

        
        return inertia('UserAccount/Create');
    }

    public function store(Request $request){
        //dd($request);
        $user = User::make($request->validate([ //  "make" function creates a new instance of the model but not stored yet 
            'name' => 'required', 
            'email' => 'required|email|unique:users', //unique:user means email field should be unique in the users table
            'mobile_no' => 'required|min:11|max:11',
            'password' => ['required','confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()]
        ], [
            'password' => 'Must contain at least 1 uppercase 1 lowercase 1 digit and 1 symbol',
            'password.confirmed' => 'Passwords do not match',
        ]));

        $user->password = Hash::make($user->password); // this will hash the password... config/hashing.php
        $user->save();
        
        Auth::login($user); // this line authenticate and login the newly created user..

        return redirect()->route('index')->with('message', 'Success');
    }
}
