<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Proyecto;
use App\Models\Tipografia;

class TipografiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $proyecto = Proyecto::findOrFail($id);
        return view('admin.proyects.tipos.index')
          ->with(compact('proyecto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        return view('admin.proyects.tipos.create')
          ->with(compact('proyecto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = Proyecto::findOrFail($request->proyect_id);
        $tipografias = Tipografia::create([
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
        $proyecto->tipografias()->save($tipografias);
        if ($request->hasFile('tipologia')) {
          if ($request->file('tipologia')->isValid()) {
            $validated = $request->validate([
              'tipologia'=>'mimes:jpeg,png|max:1000',
            ]);
            $extension = $request->tipologia->extension();
            $request->tipologia->storeAs('/public/tipologias', 'tipologia_'.$tipografias->id.".".$extension);
            $url = Storage::url('tipologias/tipologia_'.$tipografias->id.".".$extension);
            $tipografias->tipologia = $url;
            $tipografias->save();
          }
        }
        $status = 'La tipologia ha sido agregada exitosamente.';
        $proyecto = Proyecto::findOrFail($request->proyect_id);
        return view('admin.proyects.tipos.index')
          ->with(compact('proyecto', 'status'));
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
    public function edit($id)
    {
        $tipo = Tipografia::findOrFail($id);
        // dd($unidad->proyecto);
        return view('admin.proyects.tipos.edit')
          ->with(compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->orientacion);
      $tipo = Tipografia::findOrFail($id);
      $tipo->modelo = $request->modelo;
      $tipo->code = $request->code;
      $tipo->status = $request->status;
      $tipo->vulnerable = $request->vulnerable;
      $tipo->uf_m2 = $request->uf_m2;
      $tipo->lote = $request->lote;
      $tipo->piso = $request->piso;
      $tipo->orientacion = (int)$request->orientacion;
      $tipo->dormitorios = $request->dormitorios;
      $tipo->banos = $request->banos;
      $tipo->superficie_municipal = $request->superficie_municipal;
      $tipo->superficie_total = $request->superficie_total;
      $tipo->superficie_inferior = $request->superficie_inferior;
      $tipo->superficie_terrazas = $request->superficie_terrazas;
      $tipo->superficie_loggia = $request->superficie_loggia;
      $tipo->precio_lista = $request->precio_lista;
      $tipo->precio_venta = $request->precio_venta;
      if ($request->hasFile('tipologia')) {
        if ($request->file('tipologia')->isValid()) {
          $validated = $request->validate([
            'tipologia'=>'mimes:jpeg,png|max:1000',
          ]);
          //erases previos img
          $delTipo = str_replace('/storage/', "",$tipo->tipologia);
          Storage::delete('public/'.$delTipo);
          //nueva img
          $extension = $request->tipologia->extension();
          $request->tipologia->storeAs('/public/tipologias', 'tipologia_'.$tipo->id.".".$extension);
          $url = Storage::url('tipologias/tipologia_'.$tipo->id.".".$extension);
          $tipo->tipologia = $url;
        }
      }
      $tipo->save();
      // dd($unidad->proyecto);
      $status = 'La tipologia ha sido actualizada exitosamente.';
      return view('admin.proyects.tipos.edit')
        ->with(compact('tipo', 'status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = Tipografia::findOrFail($id);
        $proyecto = Proyecto::findOrFail($tipo->proyecto->id);
        // dd($proyecto);
        $delTipo = str_replace('/storage/', "",$tipo->tipologia);
        Storage::delete('public/'.$delTipo);
        $tipo->delete();
        $status = 'La tipologia ha sido eliminada exitosamente.';
        return view('admin.proyects.tipos.index')
            ->with(compact('proyecto', 'status'));
    }
}
