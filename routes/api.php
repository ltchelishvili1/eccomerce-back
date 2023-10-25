<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
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

Route::controller(AuthController::class)->group(function () {
	Route::post('/login', 'login')->name('auth.login');
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
