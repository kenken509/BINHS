<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserObject{
    public $password;
    public $email;
}

class ApiRequestController extends Controller
{
    function showUsers(){
        
        $user1 = new UserObject();

        $user1->email = "aries@gmail.com";
        $user1->password = "TestPassword";
        return response()->json($user1);
    }
}
