<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use GuzzleHttp\Middleware;

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

Route::get('login',[CustomerController::class, 'login'])->middleware('AlreadyLoggedIn');
Route::get('register',[CustomerController::class, 'register'])->middleware('AlreadyLoggedIn');
Route::post('create',[CustomerController::class, 'create'])->name('auth.create');
Route::post('check',[CustomerController::class, 'check'])->name('auth.check');
Route::get('profile',[CustomerController::class, 'profile'])->Middleware('inlogged');
Route::get('logout',[CustomerController::class, 'logout']);