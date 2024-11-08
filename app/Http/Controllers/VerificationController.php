<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmails;
use App\Models\EmailVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    /**
     * Send verification email with a unique code to the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendEmail(Request $request)
    {
        // Check if the provided password matches the authenticated user's password
        if (Hash::check($request->password, Auth::user()->password)) {
            $code = random_int(10000000, 99999999);
            $email = Auth::user()->email;

            // Check if a record exists for the user's email, update or create accordingly
            $emailVerification = EmailVerification::updateOrCreate(
                ['email' => $email],
                ['code' => $code]
            );

            SendEmails::dispatch($email, Auth::user(), $code);

            return to_route("verify.code.blade")->with("status", "A verification code has been sent to your email. Please check it.");
        }

        return redirect()->back()->with("password", "The password is incorrect.");
    }

    /**
     * Display the form for entering the verification code.
     *
     * @return \Illuminate\View\View
     */
    public function verifyCodeBlade()
    {
        return view("verify-code");
    }

    /**
     * Verify the code provided by the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|digits:8',
        ]);

        $code = $request->input('verification_code');
        $emailVerification = EmailVerification::where("email", Auth::user()->email)->first();

        // Check if the code matches and verify the user's email if correct
        if ($emailVerification && $code === $emailVerification->code) {
            $user = Auth::user();
            $user->email_verified_at = now();
            $user->save();

            return to_route("home")->with('status', 'Code verified successfully!');
        }

        return back()->withErrors(['verification_code' => 'The verification code is incorrect.']);
    }
}
