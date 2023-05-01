<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function showVerify(){
        return inertia('MailPages/FirstMail');
    }
}
