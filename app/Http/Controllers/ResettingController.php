<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
// use App\Mail\ConfirmationLoginMail;
use Illuminate\Support\Facades\Mail;
// use App\Http\Requests\PasswordConfirmation;
use App\Http\Requests\PasswordConfirmationRequest;
use App\Jobs\SendConfirmationEmail;
use Illuminate\Support\Facades\Hash;

class ResettingController extends Controller
{
    //
    public function index(){
        return view("auth.passwords.email");
    }
    public function sendEmail(MailRequest $request){
        $user = User::where("email","=",$request->email)->first();
        $href = url("")."/reset_password/". base64_encode($user->id." . ".$user->created_at);
        SendConfirmationEmail::dispatch($user,$href);
        // Mail::to($request->email)->send(new ConfirmationLoginMail($user,$href));
        return redirect()->back()->with("status","we send the reset password email , check it out .");
        // dd($request,$href);
    }
    public function resetPassword(string $hash){
        $hash = base64_decode($hash);
        [$id,$created_at] = explode(" . ",$hash);
        $user = User::find($id,);
        if($created_at === $user->created_at->toDateTimeString()){
            return view("auth.passwords.reset",compact("id"));
        }else {
            return abort(403);
        }
        // $email = $user->email;
        // dd($created_at === $user->created_at->toDateTimeString());
    }
    public function updatePassword(PasswordConfirmationRequest $request){
        $fillable = ["password"=> Hash::make($request->password) ];
        $user  = User::find($request->id);
        // dd($user);
        $user->update($fillable);
        return redirect()->route("login")->with("success","the password has been modified, log in with your new password");
    }
}
