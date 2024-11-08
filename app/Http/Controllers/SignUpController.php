<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SignUpController extends Controller
{
    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view("auth.register");
    }

    /**
     * Handle user registration and log in the new user.
     *
     * @param SignUpRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(SignUpRequest $request)
    {
        $credentials = $request->validated();
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route("home");
    }

    /**
     * Log the user out and clear the session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route("index.login");
    }
}
