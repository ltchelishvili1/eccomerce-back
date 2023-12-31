<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OAuthController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('set-language/{language}', [LanguageController::class, 'setLanguage'])->name('set-language');
Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'emailVerify'])->name('verification.verify');

Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login')->middleware('ensure.email.verified')->name('auth.login');
	Route::post('/register', 'register')->name('auth.register');
});

Route::controller(UserController::class)->group(function () {
	Route::get('/auth-user', 'index')->name('user.index');
});

Route::middleware('auth:sanctum')->group(
	function () {
		Route::get('/logout', [AuthController::class, 'logut'])->name('auth.logout');
	}
);

Route::controller(OAuthController::class)->group(function () {
	Route::get('/auth/google', 'redirect')->name('google.auth');
	Route::get('auth/google-callback', 'callbackGoogle')->name('google.callback');
});

Route::controller(ResetPasswordController::class)->group(function () {
	Route::post('/forgot-password', 'resetPassword')->name('password.reset');
	Route::post('/reset-password', 'updatePassword')->name('password.change');
	Route::post('/check-token', 'checkToken')->name('password.checkToken');
});
