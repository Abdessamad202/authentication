<?php

use App\Http\Controllers\ConfirmationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResettingController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\VerificationController;

Route::get('/home',[HomeController::class,"home"])->name("home");
Route::get("/mail",function(){
    return view("auth.mail");
});


Route::get('/login', [LoginController::class, 'index'])->name('index.login');
Route::post("/login",[LoginController::class,"login"])->name("login");

Route::get("/verify_email/{hash}",[SignUpController::class,"verifyEmail"])->name('verify.email');
Route::get("/register",[SignUpController::class,"index"])->name('index.register');
Route::get("/verify",[SignUpController::class,"verifyBlade"])->name('verify');

Route::post("/register",[SignUpController::class,"register"])->name('register');
Route::post("/logout",[SignUpController::class,"logout"])->name("logout");
Route::post("/sendEmail",[VerificationController::class,"sendEmail"])->name("email.send");
// password.request
Route::get("/password/request",[ResettingController::class,"index"])->name("password.request");
// Route::post('/password.update', [])->name("password.update");
Route::post('/password/email', [ResettingController::class,"sendEmail"])->name("password.email");
Route::get('/reset_password/{hash}', [ResettingController::class,"resetPassword"])->name("password.reset");
Route::post('/password/reset', [ResettingController::class,"updatePassword"])->name("password.update");