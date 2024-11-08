<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view("auth.login");
    }
    public function login(LoginRequest $request){
        // $user = User::where("email","=",$request->email)->first();
        if(Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->route("home")->with("status","hello " . $request->email);
        }else{
            return redirect()->back()->with("email","the email or the password are incorrect");
        }
    }
}
