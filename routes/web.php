<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/session/deleteAll', '\App\Http\Controllers\TerminateController@deleteAll')->name('session.deleteAll');
Route::delete('/sessions/{id}/delete', 'App\Http\Controllers\TerminateController@delete')->name('session.delete');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
