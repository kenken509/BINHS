<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function create(){ // presents a form that allows you to submit something

        
        return inertia('Auth/Login');
    }

    public function store(Request $request){ // create session if the data sent is valid which means there is a valid user name
        
       
       if(!Auth::attempt($request->validate([  //($request validation, remember me)
            'email' => 'required | string | email',
            'password' => 'required | string'
       ]),true)){
            throw ValidationException::withMessages([
                'email' => 'Authentication failed!'
            ]);
        }
        
        $user = User::where('email', $request->email)->first();
        

        //************************************************* */
        // if(!$user->email_verified_at){
        //     // send to verify-email view
        //     return redirect()->route('verify.show');
        // }else{
        //     $request->session()->regenerate(); // to avoid session fixation

        //     return redirect()->intended('/'); // redirect to intended page
        // }
        //********************************************************* */
        
        $request->session()->regenerate(); // to avoid session fixation

        return redirect()->intended('/'); // redirect to intended page
    }

    public function destroy(Request $request){ // destroy the current user session (log out)
        Auth::logout();

        $request->session()->invalidate(); //invalidate the session
        $request->session()->regenerateToken(); // regenerate csrf token

        return redirect()->route('index')->with('message', 'this is the message!');
    }
}
