<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeEmailForm;
use App\Jobs\EmailChanging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }
    //
    public function showChangeEmailForm()
    {
        return view("email-change");
    }
    public function changeEmail(ChangeEmailForm $request)
    {
        if (!Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'The provided password is incorrect.']);
        }
        Auth::user()->update(['email' => $request->new_email]);
        EmailChanging::dispatch($request->new_email,Auth::user());
        return to_route("home")->with('status', 'Email address updated successfully!');
    }
}
