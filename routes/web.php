<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;

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

Route::get('messages/{message}', [MessageController::class,'show'])->name('messages.show');
Route::post('messages/', [MessageController::class,'store'])->name('messages.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();




