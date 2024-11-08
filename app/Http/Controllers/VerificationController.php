<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    //
    public function sendEmail(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            SendEmails::dispatch(Auth::user()->email, Auth::user());
            return redirect()->back()->with("status", "we send to you an email to verify your account please check it out");
        } else {
            return redirect()->back()->with("password", "the password is incorrect.");
        }
        // dd();
    }
}
