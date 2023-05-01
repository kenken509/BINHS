<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\FirstMail;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function showVerify(){

        return inertia('MailPages/FirstMail');
    }

    public function showVerificationSent(){
        return inertia('MailPages/MailSent');
    }

    public function sendMail($id){
        //dd($id);
        $user = User::findOrFail($id);
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify', now()->addHours(24), ['id' => $id, 'hash' => $user->email_verified_at]
        );
        //$url = "http://127.0.0.1:8000/confirmed-email/";

        Mail::to('testing@example.com')->send(new FirstMail($verificationUrl));
        return redirect('/index');
    }

    public function confirmEmail($id){
        dd($id);
    }
}
