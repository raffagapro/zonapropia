<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\InmobiliariaController;
use App\Http\Controllers\AminProyectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\DestacadosController;
use App\Http\Controllers\ProyectsController;


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
Route::resource('proyects', ProyectsController::class);
Route::Post('proyects/list', [ProyectsController::class, 'indexList'])->name('proyects.list');

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
        Route::post('inmo/search', [InmobiliariaController::class, 'search'])->name('inmo.search');
        Route::post('inmo/addProject', [InmobiliariaController::class, 'addProject'])->name('inmo.addProyect');
        Route::post('inmo/rmProject/{proyect_id}/{inmo_id}', [InmobiliariaController::class, 'rmProject'])->name('inmo.rmProyect');
        Route::get('inmo/filter', [InmobiliariaController::class, 'filter'])->name('inmo.filter');
        Route::resource('aProyect', AminProyectController::class, ['except'=>['show']]);
        Route::post('aProyect/{proyect}/addTag', [AminProyectController::class, 'addTag'])->name('aProyect.addTag');
        Route::get('aProyect/{proyect}/{tag}/rmTag', [AminProyectController::class, 'rmTag'])->name('aProyect.rmTag');
        Route::post('aProyect/{proyect}/highlight', [AminProyectController::class, 'highlight'])->name('aProyect.highlight');
        Route::post('aProyect/{proyect}/deHighlight', [AminProyectController::class, 'deHighlight'])->name('aProyect.deHighlight');
        Route::post('aProyect/{proyect}/publicar', [AminProyectController::class, 'publish'])->name('aProyect.publish');
        Route::post('aProyect/{proyect}/borrador', [AminProyectController::class, 'draft'])->name('aProyect.draft');
        Route::get('aProyect/filter', [AminProyectController::class, 'filter'])->name('aProyect.filter');
        Route::resource('region', RegionController::class);
        Route::resource('category', CategoriaController::class, ['except'=>['create', 'show']]);
        Route::resource('tag', TagController::class, ['except'=>['create', 'show']]);
        Route::post('media/bannerImgStore', [MediaController::class, 'storeBanner'])->name('media.storeBanner');
        Route::post('media/mainImgStore', [MediaController::class, 'storeMain'])->name('media.storeMain');
        Route::post('media/mediaImgStore', [MediaController::class, 'storeMedia'])->name('media.storeMedia');
        Route::get('media/delete/{media_id}/{proyect_id}', [MediaController::class, 'delMedia'])->name('media.delMedia');
        Route::get('dest', [DestacadosController::class, 'index'])->name('dest.index');
        Route::post('dest/search', [DestacadosController::class, 'search'])->name('dest.search');
        Route::post('dest/add/{proyect_id}', [DestacadosController::class, 'add'])->name('dest.add');
        Route::post('dest/remove/{proyect_id}', [DestacadosController::class, 'remove'])->name('dest.remove');


      });
    });
});
