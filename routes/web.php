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
use App\Http\Controllers\ProyectController;
use App\Http\Controllers\UserProfile;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\TipologiaController;
use App\Http\Controllers\ContactFromController;
use App\Http\Controllers\InvertirPageController;
use App\Http\Controllers\InvertirPostController;
use App\Http\Controllers\FinanciamientoController;
use App\Http\Controllers\RespaldoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ParkingController;


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
Route::resource('contactForm', ContactFromController::class);
Route::resource('proyects', ProyectsController::class, ['except'=>['store']]);
Route::post('proyects/list', [ProyectsController::class, 'indexList'])->name('proyects.list');
Route::post('proyects', [ProyectsController::class, 'search'])->name('proyects.search');
Route::post('proyects/comuna', [ProyectsController::class, 'comunaGrabber']);
Route::get('proyects/like/{proyect}/{user}', [ProyectsController::class, 'likeProyect'])->name('proyects.like');
Route::get('proyects/unlike/{proyect}/{user}', [ProyectsController::class, 'unlikeProyect'])->name('proyects.unlike');

Route::get('proyect/{proyect_id}', [ProyectController::class, 'show'])->name('proyect.show');
Route::post('proyect/uSwitcher', [ProyectController::class, 'unitSwitcher']);
Route::post('proyect/tSwitcher', [ProyectController::class, 'tipoSwitcher']);
Route::post('proyect/oSwitcher', [ProyectController::class, 'oriSwitcher']);
Route::post('proyect/pSwitcher', [ProyectController::class, 'pisoSwitcher']);

Route::resource('Invertir', InvertirPageController::class);
Route::resource('InvertirPost', InvertirPostController::class, ['except'=> ['index']]);
Route::get('InvertirPost/post/{post_id}', [InvertirPostController::class, 'index'])->name('InvertirPost.indez');
Route::resource('Financiamiento', FinanciamientoController::class);
Route::resource('Respaldo', RespaldoController::class);





Auth::routes();

//experimental, not sure WTF i am doing!!!!!!
Route::middleware(['auth'])->group(function (){
    Route::resource('userProfile', UserProfile::class);
    Route::put('userProfile/updatePW/{user}', [UserProfile::class, 'updatePW'])->name('userProfile.updatePW');
    Route::resource('cotizacion', CotizacionController::class, ['except'=>['index']]);
    Route::get('cotizacion/{id}/index', [CotizacionController::class, 'index'])->name('cotizacion.index');
    Route::get('cotizacion/online/reserva', [CotizacionController::class, 'reserva'])->name('cotizacion.reserva');


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
        Route::post('aProyect/{proyect}/addvendedor', [AminProyectController::class, 'addVendedor'])->name('aProyect.addVendedor');
        Route::get('aProyect/{proyect}/{vendedor}/rmvendedor', [AminProyectController::class, 'rmVendedor'])->name('aProyect.rmVendedor');
        Route::post('aProyect/{proyect}/addCar', [AminProyectController::class, 'addCar'])->name('aProyect.addCar');
        Route::get('aProyect/{proyect}/{car}/rmCar', [AminProyectController::class, 'rmCar'])->name('aProyect.rmCar');
        Route::post('aProyect/{proyect}/highlight', [AminProyectController::class, 'highlight'])->name('aProyect.highlight');
        Route::post('aProyect/{proyect}/deHighlight', [AminProyectController::class, 'deHighlight'])->name('aProyect.deHighlight');
        Route::post('aProyect/{proyect}/publicar', [AminProyectController::class, 'publish'])->name('aProyect.publish');
        Route::post('aProyect/{proyect}/borrador', [AminProyectController::class, 'draft'])->name('aProyect.draft');
        Route::get('aProyect/filter', [AminProyectController::class, 'filter'])->name('aProyect.filter');
        Route::post('aProyect/filter2', [AminProyectController::class, 'filter2'])->name('aProyect.filter2');
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
        Route::post('dest/up/{dest_id}', [DestacadosController::class, 'up'])->name('dest.up');
        Route::post('dest/down{dest_id}', [DestacadosController::class, 'down'])->name('dest.down');
        Route::resource('unidad', UnidadController::class, ['except'=>['index', 'create', 'show']]);
        Route::post('unidad/{proyect}', [UnidadController::class, 'zIndex'])->name('unidad.zIndex');
        Route::get('unidad/create/{proyect}', [UnidadController::class, 'zCreate'])->name('unidad.zCreate');
        Route::resource('caracs', CaracteristicasController::class, ['except'=>['show', 'create']]);
        Route::post('caracs/addMedia', [CaracteristicasController::class, 'addMedia'])->name('caracs.addMedia');
        Route::get('caracs/rmMedia/{media}', [CaracteristicasController::class, 'rmMedia'])->name('caracs.rmMedia');
        Route::resource('tipo', TipologiaController::class);
        Route::post('tipo/proyectSwitcher', [TipologiaController::class, 'proyectSwitcher']);
        Route::post('tipo/{unidad}/addUnid', [TipologiaController::class, 'addUnid'])->name('tipo.addUnid');
        Route::get('tipo/{unidad}/{tipologia}/rmUnid', [TipologiaController::class, 'rmUnid'])->name('tipo.rmUnid');
        Route::resource('post', PostController::class);
        Route::post('post/{post}/addTag', [PostController::class, 'addTag'])->name('post.addTag');
        Route::get('post/{post}/{tag}/rmTag', [PostController::class, 'rmTag'])->name('post.rmTag');
        Route::post('post/bannerImgStore', [PostController::class, 'storeBanner'])->name('post.storeBanner');
        Route::post('post/principalImgStore', [PostController::class, 'storePrincipal'])->name('post.storeMain');
        Route::resource('estacionamiento', ParkingController::class, ['except'=>['index', 'create', 'show', 'store']]);
        Route::post('estacionamiento/crear/{proyecto_id}', [ParkingController::class, 'store'])->name('estacionamiento.addspot');
        Route::post('estacionamiento/ocupado/{parking_id}', [ParkingController::class, 'parkingOcupado'])->name('estacionamiento.ocupado');
        Route::post('estacionamiento/disponible/{parking_id}', [ParkingController::class, 'parkingDisponible'])->name('estacionamiento.disponible');

      });
    });
});

