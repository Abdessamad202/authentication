<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use App\Http\Requests\SignUpRequest;
use App\Jobs\SendEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function Symfony\Component\Clock\now;

class SignUpController extends Controller
{
    //
    public function index()  {
        return view("auth.register");
    }
    public function verifyBlade()  {
        if(Auth::check()){
            return view("verify");
        }else{
            return redirect()->route("home");
        }
    }
    public function register(SignUpRequest $request)  {
        $credintials = $request->validated();
        $credintials["password"] = Hash::make($credintials["password"]);
        $user = User::create($request->validated());
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route("home");
    }
    public function verifyEmail(string $hash,Request $request)  {
        [$id,$createdAt] = explode(".",base64_decode($hash));
        $user =  User::find($id);
        if($user->created_at->toDateTimeString() === $createdAt){
            if($user->email_verified_at === null){
                $user->email_verified_at = now();
                $user->save();
                // Auth::login($user);
                // $request->session()->regenerate();
                return view("verificated");
            }else{
                return view("alreadyVerified");
            }
        }else{
            abort(403);
        }
        // dd($id,$user);
    }
    public function logout() {
        Session::flush();
        Auth::logout();
        return redirect()->route("index.login");
    }

}
