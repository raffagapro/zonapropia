<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\InmobiliariaController;
use App\Http\Controllers\AminProyectController;
use App\Http\Controllers\RegionController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/proyects', function () { return view('proyects.index'); })->name('proyects');
Route::get('/proyect', function () { return view('proyect.index'); })->name('proyect');
Auth::routes();

//experimental, not sure WTF i am doing!!!!!!
Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function(){
      Route::middleware(['apa'])->group(function () {
        // Route::resource('roles', RoleController::class);
        Route::resource('adminPanel', AdminController::class, ['except'=>['create', 'store', 'show']]);
        Route::post('adminPanel/{user}', [AdminController::class, 'show'])->name('adminPanel.show');
        Route::post('adminPanel/{user}/addRole', [AdminController::class, 'addRole'])->name('adminPanel.addRole');
        Route::get('adminPanel/{user}/{role}/rmRole', [AdminController::class, 'rmRole'])->name('adminPanel.rmRole');
        Route::get('adminPanel/filter', [AdminController::class, 'filter'])->name('adminPanel.filter');
        Route::post('adminPanel/{user}/restore', [AdminController::class, 'restore'])->name('adminPanel.restore');
        Route::resource('notice', NoticesController::class, ['except'=>['create', 'show']]);
        Route::resource('inmo', InmobiliariaController::class, ['except'=>['show']]);
        Route::put('inmo/show/{id}', [InmobiliariaController::class, 'show'])->name('inmo.show');
        Route::put('inmo/hide/{id}', [InmobiliariaController::class, 'hide'])->name('inmo.hide');
        Route::resource('aProyect', AminProyectController::class);
        Route::resource('region', RegionController::class);




      });
    });
});
