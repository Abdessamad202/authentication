<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\MailRequest;
use App\Http\Requests\PasswordConfirmationRequest;
use App\Jobs\SendConfirmationEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

class ResettingController extends Controller
{
    /**
     * Show the form for entering the email to reset password.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view("auth.passwords.email");
    }

    /**
     * Send reset password email with unique link.
     *
     * @param MailRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function resetEmail(MailRequest $request)
    {
        $user = User::where("email", $request->email)->firstOrFail();
        $resetLink = URL::to("/reset_password/" . base64_encode("{$user->id}.{$user->created_at}"));
        
        SendConfirmationEmail::dispatch($user, $resetLink);

        return redirect()->back()->with("status", "A reset password email has been sent. Please check your inbox.");
    }

    /**
     * Show the password reset form if the hash is valid.
     *
     * @param string $hash
     * @return \Illuminate\View\View|\Symfony\Component\HttpFoundation\Response
     */
    public function resetPassword(string $hash)
    {
        $decodedHash = base64_decode($hash);
        [$id, $created_at] = explode(".", $decodedHash);

        $user = User::findOrFail($id);

        if ($created_at === $user->created_at->toDateTimeString()) {
            return view("auth.passwords.reset", compact("id"));
        }else{
            return abort(403, "Unauthorized action.");
        }
    }

    /**
     * Update the user's password after reset.
     *
     * @param PasswordConfirmationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(PasswordConfirmationRequest $request)
    {
        $user = User::findOrFail($request->id);
        $user->update(['password' => Hash::make($request->password)]);

        return redirect()->route("login")->with("success", "Your password has been updated. Please log in with your new password.");
    }
}
