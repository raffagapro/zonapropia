<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\LogOutController;


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
// Route::post('/test', [LogOutController::class, 'store'])->name('test');
// Route::post('/tejjhkhst', 'App\Http\Controllers\LogOutController@store')->name('erkfhekru');
Route::get('/', function () { return view('home.index'); })->name('home');
Route::get('/proyects', function () { return view('proyects.index'); })->name('proyects');
Route::get('/proyect', function () { return view('proyect.index'); })->name('proyect');
Auth::routes();
