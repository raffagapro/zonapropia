<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;
use App\Models\Region;
use App\Models\Provincia;
use App\Models\Comuna;
use App\Models\Inmobiliaria;
use App\Models\Categoria;
use App\Models\Taggable;
use App\Models\Caracteristica;



class AminProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $proyects = Proyecto::paginate(25);
      return view('admin.proyects.index')->with(compact('proyects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      return view('admin.proyects.create')
        ->with(compact('regions', 'inmos', 'cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      // dd($request->all());
      $destacar = 0;
      if ($request->destacar !== 0) {
        $destacar = 1;
      }
      // dd($request->all());
      $proyect = Proyecto::create([
        'name' => $request->nombre,
        'direccion' => $request->direccion,
        'ciudad' => $request->ciudad,
        'descripcion' => $request->descripcion,
        'latitud' => $request->latitud,
        'longitud' => $request->longitud,
        'destacado' => $destacar,
        'texto_destacado' => $request->textoDestacado,
        'bono_pie_monto' => $request->bonoPieMonto,
        'cuota_monto' => $request->cuotaMonto,
        'cuota_pie_fecha_limite' => $request->fechaLimite,
        'terminos' => $request->terminos,
        'texto_proyecto' => $request->textoProyecto,
        'estado_id' => $request->status,
        'minRooms' => $request->minRoom,
        'maxRooms' => $request->maxRoom,
        'minBathrooms' => $request->minBath,
        'maxBathrooms' => $request->maxBath,
        'minMC' => $request->minMC,
        'maxMC' => $request->maxMC,
      ]);
      if ((int)$request->inmo !== 0) {
        $inmo = Inmobiliaria::findOrFail((int)$request->inmo);
        $inmo->proyects()->save($proyect);
      }
      $region = Region::findOrFail((int)$request->region);
      $region->proyects()->save($proyect);
      $provincia = Provincia::findOrFail((int)$request->provincia);
      $provincia->proyects()->save($proyect);
      $comuna = Comuna::findOrFail((int)$request->comuna);
      $comuna->proyects()->save($proyect);

      $cat= Categoria::findOrFail((int)$request->cat);
      $cat->proyects()->save($proyect);
      $regions = Region::all();
      $inmos = Inmobiliaria::all();
      $cats = Categoria::all();
      $tags = Taggable::all();
      $status = 'El proyecto ha sido creado exitosamente.';
      return view('admin.proyects.edit')
        ->with(compact('proyect', 'status', 'regions', 'inmos', 'cats', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $proyect = Proyecto::findOrFail($id);
      // $unidades = $proyect->unidades;
      // $unidades = $unidades->sortBy('precio_venta');
      // $unidad = $unidades->first();
      // dd($unidad->precio_venta);
      $cats = Categoria::all();
      $caracs = Caracteristica::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $tags = Taggable::all();
      return view('admin.proyects.edit')
        ->with(compact(
          'proyect',
          'cats',
          'inmos',
          'regions',
          'tags',
          'caracs'
        ));
    }

    public function addTag(Request $request, $id){
      $proyect = Proyecto::findOrFail($id);
      $tag = Taggable::findOrFail($request->tag);
      if (!$proyect->tags()->where('name', $tag->name)->first()) {
        $proyect->tags()->attach($tag);
        $status = 'El Tag ha sido agregado.';
      }else {
        $status = 'El Tag ya se esta asociado con el proyecto.';
      }
      $caracs = Caracteristica::all();
      $tags = Taggable::all();
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      return back()->with(compact(
        'status',
        'proyect',
        'cats',
        'inmos',
        'regions',
        'tags',
        'caracs'
      ));
    }

    public function rmTag($id, $tag_id){
      $proyect = Proyecto::findOrFail($id);
      $tag = Taggable::findOrFail($tag_id);
      $proyect->tags()->detach($tag);
      $caracs = Caracteristica::all();
      $tags = Taggable::all();
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $status = 'El tag ha sido eliminado.';
      return back()->with(compact(
        'status',
        'proyect',
        'cats',
        'inmos',
        'regions',
        'tags',
        'caracs'
      ));
    }

    public function addCar(Request $request, $id){
      $proyect = Proyecto::findOrFail($id);
      $car = Caracteristica::findOrFail($request->car);
      if (!$proyect->caracteristicas()->where('name', $car->name)->first()) {
        $proyect->caracteristicas()->attach($car);
        $status = 'La caracteristica ha sido agregada.';
      }else {
        $status = 'La caracteristica ya esta asociada con el proyecto.';
      }
      $caracs = Caracteristica::all();
      $tags = Taggable::all();
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      return back()->with(compact(
        'status',
        'proyect',
        'cats',
        'inmos',
        'regions',
        'tags',
        'caracs'
      ));
    }

    public function rmCar($id, $car_id){
      $proyect = Proyecto::findOrFail($id);
      $car = Caracteristica::findOrFail($car_id);
      $proyect->caracteristicas()->detach($car);
      $caracs = Caracteristica::all();
      $tags = Taggable::all();
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $status = 'La caracteristica ha sido eliminada.';
      return back()->with(compact(
        'status',
        'proyect',
        'cats',
        'inmos',
        'regions',
        'tags',
        'caracs'
      ));
    }


    public function highlight(Request $request, $id){
      $proyect = Proyecto::findOrFail($id);
      $proyect->destacado = 1;
      $proyect->save();
      $proyects = Proyecto::paginate(25);
      $status = 'El proyecto ha sido destacado.';
      return back()->with(compact('status', 'proyects'));
    }

    public function deHighlight(Request $request, $id){
      $proyect = Proyecto::findOrFail($id);
      $proyect->destacado = 0;
      $proyect->save();
      $proyects = Proyecto::paginate(25);
      $status = 'El proyecto yano es destacado.';
      return back()->with(compact('status', 'proyects'));
    }

    public function publish(Request $request, $id){
      $proyect = Proyecto::findOrFail($id);
      $proyect->estado_id = 1;
      $proyect->save();
      $proyects = Proyecto::paginate(25);
      $status = 'El proyecto ha sido publicado.';
      return back()->with(compact('status', 'proyects'));
    }

    public function draft(Request $request, $id){
      $proyect = Proyecto::findOrFail($id);
      $proyect->estado_id = 0;
      $proyect->save();
      $proyects = Proyecto::paginate(25);
      $status = 'El proyecto ha sido puesto como borrador.';
      return back()->with(compact('status', 'proyects'));
    }

    public function filter(Request $request){
      if ($request->search !== null) {
        $proyects = Proyecto::where('name', 'LIKE', '%'.$request->search.'%')
        // $proyects = Proyecto::where('name', 'LIKE', '%'.$request->search.'%')
        // $user->posts()
        //   ->where(function (Builder $query) {
        //       return $query->where('active', 1)
        //                    ->orWhere('votes', '>=', 100);
        //   })
        //   ->get();
        //

          ->orWhere('inmobiliaria_id', 'LIKE', '%'.$request->search.'%')
          ->paginate(25);
      } else {
        $proyects = Proyecto::paginate(25);
      }
      $searched = $request->search;
      return view('admin.proyects.index')->with(compact(
        'proyects',
        'searched',
      ));
    }

    public function provinsiaGrabber(Request $request){
      $region = Region::findOrFail($request->region);
      $provincias = $region->provincias;
      $comunas = $provincias[0]->comunas;
      return [$provincias, $comunas];
    }

    public function comunaGrabber(Request $request){
      $provincia = Provincia::findOrFail($request->provincia);
      $comunas = $provincia->comunas;
      return [$comunas];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      // dd($request->destacar);
      $proyect = Proyecto::findOrFail($id);
      $proyect->name = $request->nombre;
      $proyect->direccion = $request->direccion;
      $proyect->ciudad = $request->ciudad;
      $proyect->descripcion = $request->descripcion;
      $proyect->latitud = $request->latitud;
      $proyect->longitud = $request->longitud;
      $destacar = 0;
      if ((int)$request->destacar !== 0) {
        $destacar = 1;
      }
      $proyect->destacado = $destacar;
      $proyect->texto_destacado = $request->textoDestacado;
      $proyect->bono_pie_monto = $request->bonoPieMonto;
      $proyect->cuota_monto = $request->cuotaMonto;
      $proyect->cuota_pie_fecha_limite = $request->fechaLimite;
      $proyect->terminos = $request->terminos;
      $proyect->texto_proyecto = $request->textoProyecto;
      $proyect->estado_id = $request->status;
      $proyect->minRooms = $request->minRoom;
      $proyect->maxRooms = $request->maxRoom;
      $proyect->minBathrooms = $request->minBath;
      $proyect->maxBathrooms = $request->maxBath;
      $proyect->minMC = $request->minMC;
      $proyect->maxMC = $request->maxMC;
      if ((int)$request->inmo === 0) {
        $proyect->inmobiliaria()->dissociate();
      }
      if ((int)$request->inmo !== 0) {
        if ($proyect->inmobiliaria !== null) {
          if ($request->inmo !== $proyect->inmobiliaria->id) {
            $proyect->inmobiliaria()->dissociate();
          }
        }
        $inmo = Inmobiliaria::findOrFail((int)$request->inmo);
        $inmo->proyects()->save($proyect);
      }
      if ($request->region !== $proyect->region->id) {
        $proyect->region()->dissociate();
        $region = Region::findOrFail((int)$request->region);
        $region->proyects()->save($proyect);
      }
      if ($request->provincia !== $proyect->provincia->id) {
        $proyect->provincia()->dissociate();
        $provincia = Provincia::findOrFail((int)$request->provincia);
        $provincia->proyects()->save($proyect);
      }
      if ($request->comuna !== $proyect->comuna->id) {
        $proyect->comuna()->dissociate();
        $comuna = Comuna::findOrFail((int)$request->comuna);
        $comuna->proyects()->save($proyect);
      }
      if ($request->cat !== $proyect->categoria->id) {
        $proyect->categoria()->dissociate();
        $cat= Categoria::findOrFail((int)$request->cat);
        $cat->proyects()->save($proyect);
      }
      $proyect->save();

      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $status = 'El proyecto ha sido actualizado exitosamente.';
      return back()->with(compact('proyect', 'status', 'cats', 'inmos', 'regions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $proyect = Proyecto::findOrFail($id);
      //media
      if ($proyect->media !== null) {
        foreach ($proyect->media as $m) {
          $m->delete();
          $delInmo = str_replace('/storage/', "",$m->loc);
          Storage::delete('public/'.$delInmo);
        }
      }
      //Tags
      if ($proyect->tags !== null) {
        foreach ($proyect->tags as $tag) {
          $proyect->tags()->detach($tag);
        }
      }
      $proyect->delete();
      $proyects = Proyecto::paginate(25);
      $status = 'El proyecto ha sido eliminado.';
      return view('admin.proyects.index')->with(compact('proyects', 'status'));
    }
}
