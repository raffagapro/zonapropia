<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Unidad;
use App\Models\Tipologia;
use App\Models\Proyecto;

class TipologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $tipologias = Tipologia::paginate(25);
      return view('admin.proyects.tipos.index')->with(compact('tipologias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.proyects.tipos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // dd($request->unidad);
        $tipologia = Tipologia::create([
          'titulo' => $request->titulo,
        ]);
        if ($request->unidad !== 'z') {
          $unidad = Unidad::findOrFail($request->unidad);
          $unidad->tipologias()->attach($tipologia);
        }
        if ($request->hasFile('media')) {
          if ($request->file('media')->isValid()) {
            $validated = $request->validate([
              'media'=>'mimes:jpeg,png|max:1000',
            ]);
            $extension = $request->media->extension();
            $request->media->storeAs('/public/tipologias', 'tipologia_'.$tipologia->id.".".$extension);
            $url = Storage::url('tipologias/tipologia_'.$tipologia->id.".".$extension);
            $url = str_replace('/storage/', "",$url);
            $tipologia->media = $url;
            $tipologia->save();
          }
        }
        $status = 'La tipologia ha sido agregada exitosamente.';
        return redirect()->route('tipo.index')->with(compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        // dd($id);
        $tipo = Tipologia::findOrFail($id);
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
    public function update(Request $request, $id){
        $tipo = Tipologia::findOrFail($id);
        $tipo->titulo = $request->titulo;
        if ($request->hasFile('media')) {
            if ($request->file('media')->isValid()) {
                $validated = $request->validate([
                'media'=>'mimes:jpeg,png|max:1000',
                ]);
                //erases previos img
                Storage::delete('public/'.$tipo->tipologia);
                //nueva img
                $extension = $request->media->extension();
                $request->media->storeAs('/public/tipologias', 'tipologia_'.$tipo->id.".".$extension);
                $url = Storage::url('tipologias/tipologia_'.$tipo->id.".".$extension);
                $url = str_replace('/storage/', "",$url);
                $tipo->media = $url;
            }
        }
        $tipo->save();
        // dd($unidad->proyecto);
        $status = 'La tipologia ha sido actualizada exitosamente.';
        // dd($unidad->proyecto);
        return redirect()->route('tipo.edit', $tipo->id)->with(compact('status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $tipo = Tipologia::findOrFail($id);
        // dd($proyecto);
        Storage::delete('public/'.$tipo->tipologia);
        $unidades = $tipo->unidades;
        foreach ($unidades as $unidad) {
          $unidad->tipologias()->detach($tipo);
        }
        $tipo->delete();
        $status = 'La tipologia ha sido eliminada exitosamente.';
        $tipologias = Tipologia::paginate(25);
        return redirect()->route('tipo.index')->with(compact('status'));
    }

    public function proyectSwitcher(Request $request){
      $proyect = Proyecto::findOrFail($request->proyecto);
      $unidades = $proyect->unidades;
      return $unidades;
    }

    public function addUnid(Request $request, $id)
    {
      $tipologia = Tipologia::findOrFail($id);
      $unidad = Unidad::findOrFail($request->unidad);
      // dd($tipologia->id, $unidad->id, $unidad->tipologias->where('id', $tipologia->id)->first());
      if (!$unidad->tipologias->where('id', $tipologia->id)->first()) {
        $unidad->tipologias()->attach($tipologia);
      }
      $tipo = Tipologia::findOrFail($id);
      $status = 'La tipologia ha sido agregada a la unidad.';
      return back()->with(compact('status', 'tipo'));
    }

    public function rmUnid($unidadId, $tipologiaId)
    {
      $unidad = Unidad::findOrFail($unidadId);
      $tipo = Tipologia::findOrFail($tipologiaId);
      $unidad->tipologias()->detach($tipo);
      $status = 'La unidad has sido removida.';
      return back()->with(compact('status', 'tipo'));
    }
}
