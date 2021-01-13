<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;
use App\Models\Region;
use App\Models\Inmobiliaria;
use App\Models\Categoria;
use App\Models\Taggable;



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
        'comuna' => $request->comuna,
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $proyect = Proyecto::findOrFail($id);
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $tags = Taggable::all();
      return view('admin.proyects.edit')
        ->with(compact('proyect', 'cats', 'inmos', 'regions', 'tags'));
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
      $tags = Taggable::all();
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      return back()->with(compact('status', 'proyect', 'cats', 'inmos', 'regions', 'tags'));
    }

    public function rmTag($id, $tag_id){
      $proyect = Proyecto::findOrFail($id);
      $tag = Taggable::findOrFail($tag_id);
      $proyect->tags()->detach($tag);
      $tags = Taggable::all();
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $status = 'El tag ha sido eliminado.';
      return back()->with(compact('status', 'proyect', 'cats', 'inmos', 'regions', 'tags'));
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
      $proyect->comuna = $request->comuna;
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
      }else {
        // code...
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
