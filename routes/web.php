<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserData;

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
    return redirect('home');
});
Route::get('logout', function(){
    session()->forget('user');
    return view('login');
});
Route::view("home", "home");
Route::view("signup", "register");
Route::view("login", "login");
Route::post("register", [UserData::class,"register"]);
Route::post("login", [UserData::class,"login"]);