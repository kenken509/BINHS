<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(){
        //dd(Auth::user());
        return inertia('Index/Index');
    }
    
    public function show(){
        return inertia('Index/Show',[
            'currentUrl' => 'home'
        ]);
    }

    // public function showAbout(){
    //     return inertia('Index/WebPages/About');
    // }

    // public function showContact(){
    //     return inertia('Index/WebPages/Contact');
    // }

    // public function showDownloads(){
    //     return inertia('Index/WebPages/Downloads');
    // }

    // public function showNews(){
    //     return inertia('Index/WebPages/News');
    // }
}
