<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ResettingController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\VerificationController;

// Home Route
Route::get('/home', [HomeController::class, "home"])->name("home");

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('index.login');
Route::post("/login", [LoginController::class, "login"])->name("login");
Route::post("/logout", [SignUpController::class, "logout"])->name("logout");

// Registration Routes
Route::get("/register", [SignUpController::class, "index"])->name('index.register');
Route::post("/register", [SignUpController::class, "register"])->name('register');

// Password Reset Routes
Route::get("/password/request", [ResettingController::class, "index"])->name("password.request");
Route::post('/password/email', [ResettingController::class, "resetEmail"])->name("password.email");
Route::get('/reset_password/{hash}', [ResettingController::class, "resetPassword"])->name("password.reset");
Route::post('/password/reset', [ResettingController::class, "updatePassword"])->name("password.update");

// Email Verification Routes
Route::post("/sendEmail", [VerificationController::class, "sendEmail"])->name("email.send");
Route::get('/verify_email', [VerificationController::class, "verifyCodeBlade"])->name("verify.code.blade");
Route::post('/verify-code', [VerificationController::class, 'verifyCode'])->name('verify.code');

// Miscellaneous Routes
Route::get("/mail", function() {
    return view("auth.mail");
});
// email changing routes
Route::get('/change-email', [UserController::class, 'showChangeEmailForm'])->name('email.change.form');
Route::post('/change-email', [UserController::class, 'changeEmail'])->name('email.change');