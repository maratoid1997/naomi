<?php

use App\Http\Controllers\Api\V1\Authorization\RecoveryController;
use App\Http\Controllers\Api\V1\Authorization\SocialAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('password-reset', [RecoveryController::class, 'emptyMethod'])->name('password.reset');
