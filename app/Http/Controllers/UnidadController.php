<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;
use App\Models\Unidad;
use App\Models\Tipografia;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zIndex($id){
      $proyecto = Proyecto::findOrFail($id);
      // $unidades = $proyecto->unidades->paginate(25);
      // dd($proyecto->unidades->all());
      return view('admin.proyects.unidades.index')
        ->with(compact('proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zCreate($id){
      $proyecto = Proyecto::findOrFail($id);
      return view('admin.proyects.unidades.create')
        ->with(compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $proyecto = Proyecto::findOrFail($request->proyect_id);
      $unidad = Unidad::create([
        'modelo' => $request->modelo,
        'code' => $request->code,
        'status' => $request->status,
        'vulnerable' => $request->vulnerable,
        'uf_m2' => $request->uf_m2,
        'lote' => $request->lote,
        'piso' => $request->piso,
        'orientacion' => $request->orientacion,
        'dormitorios' => $request->dormitorios,
        'banos' => $request->banos,
        'superficie_municipal' => $request->superficie_municipal,
        'superficie_total' => $request->superficie_total,
        'superficie_inferior' => $request->superficie_inferior,
        'superficie_terrazas' => $request->superficie_terrazas,
        'superficie_loggia' => $request->superficie_loggia,
        'precio_lista' => $request->precio_lista,
        'precio_venta' => $request->precio_venta,
      ]);
      $proyecto->unidades()->save($unidad);
      $status = 'La unidad ha sido agregada exitosamente.';
      $proyecto = Proyecto::findOrFail($request->proyect_id);
      return view('admin.proyects.unidades.index')
        ->with(compact('proyecto', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $unidad = Unidad::findOrFail($id);
      $proyecto = $unidad->proyecto;
      // dd($unidad->proyecto);
      return view('admin.proyects.unidades.edit')
        ->with(compact('unidad', 'proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      // dd($id);
      $unidad = Unidad::findOrFail($id);
      $unidad->modelo = $request->modelo;
      $unidad->code = $request->code;
      $unidad->status = $request->status;
      $unidad->vulnerable = $request->vulnerable;
      $unidad->uf_m2 = $request->uf_m2;
      $unidad->lote = $request->lote;
      $unidad->piso = $request->piso;
      $unidad->orientacion = (int)$request->orientacion;
      $unidad->dormitorios = $request->dormitorios;
      $unidad->banos = $request->banos;
      $unidad->superficie_municipal = $request->superficie_municipal;
      $unidad->superficie_total = $request->superficie_total;
      $unidad->superficie_inferior = $request->superficie_inferior;
      $unidad->superficie_terrazas = $request->superficie_terrazas;
      $unidad->superficie_loggia = $request->superficie_loggia;
      $unidad->precio_lista = $request->precio_lista;
      $unidad->precio_venta = $request->precio_venta;
      $unidad->save();
      // dd($unidad->proyecto);
      $proyecto = $unidad->proyecto;
      $status = 'La unidad ha sido actualizada exitosamente.';
      return view('admin.proyects.unidades.edit')
        ->with(compact('unidad', 'status', 'proyecto'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $unidad = Unidad::findOrFail($id);
      $proyecto = Proyecto::findOrFail($unidad->proyecto->id);
      // dd($proyecto);
      $unidad->delete();
      $status = 'La unidad ha sido eliminada exitosamente.';
      return view('admin.proyects.unidades.index')
        ->with(compact('proyecto', 'status'));
    }
}
