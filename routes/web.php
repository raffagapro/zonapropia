<?php

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

Route::get('/', function () { return view('home.index'); })->name('home');
Route::get('/proyects', function () { return view('proyects.index'); })->name('proyects');
Route::get('/proyect', function () { return view('proyect.index'); })->name('proyect');

// We create a controler in terminal with
// php artisan make:controller Auth\\RegisterController
// This creates the folder "Auth" and file "RegisterController" in the app folder
// Inside "RegisterControler" File we set up the view and method, and call it here
// We also have to import it at the top
// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store']);
