<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Unidad;
use App\Models\Tipologia;

class TipologiaController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
        $unidad = Unidad::findOrFail($id);
        return view('admin.proyects.tipos.create')
          ->with(compact('unidad'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $unidad = Unidad::findOrFail($request->unidad);
        $tipologia = Tipologia::create([
          'titulo' => $request->titulo,
        ]);
        $unidad->tipologias()->save($tipologia);
        if ($request->hasFile('media')) {
          if ($request->file('media')->isValid()) {
            $validated = $request->validate([
              'media'=>'mimes:jpeg,png|max:1000',
            ]);
            $extension = $request->media->extension();
            $request->media->storeAs('/public/tipologias', 'tipologia_'.$tipologia->id.".".$extension);
            $url = Storage::url('tipologias/tipologia_'.$tipologia->id.".".$extension);
            $tipologia->media = $url;
            $tipologia->save();
          }
        }
        $status = 'La tipologia ha sido agregada exitosamente.';
        $proyecto = $unidad->proyecto;
        // dd($unidad->proyecto);
        return view('admin.proyects.unidades.edit')
          ->with(compact('unidad', 'proyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $tipo = Tipologia::findOrFail($id);
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
    public function update(Request $request, $id){
        $tipo = Tipologia::findOrFail($id);
        $tipo->titulo = $request->titulo;
        if ($request->hasFile('media')) {
            if ($request->file('media')->isValid()) {
                $validated = $request->validate([
                'media'=>'mimes:jpeg,png|max:1000',
                ]);
                //erases previos img
                $delTipo = str_replace('/storage/', "",$tipo->media);
                Storage::delete('public/'.$delTipo);
                //nueva img
                $extension = $request->media->extension();
                $request->media->storeAs('/public/tipologias', 'tipologia_'.$tipo->id.".".$extension);
                $url = Storage::url('tipologias/tipologia_'.$tipo->id.".".$extension);
                $tipo->media = $url;
            }
        }
        $tipo->save();
        // dd($unidad->proyecto);
        $status = 'La tipologia ha sido actualizada exitosamente.';
        $unidad = Unidad::findOrFail((int)$request->unidad);
        $proyecto = $unidad->proyecto;
        // dd($unidad->proyecto);
        return view('admin.proyects.unidades.edit')
            ->with(compact('unidad', 'proyecto'));
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
        $delTipo = str_replace('/storage/', "",$tipo->tipologia);
        Storage::delete('public/'.$delTipo);
        $tipo->delete();
        $unidad = $tipo->unidad;
        $proyecto = $unidad->proyecto;
        $status = 'La tipologia ha sido eliminada exitosamente.';
        return view('admin.proyects.unidades.edit')
            ->with(compact('proyecto', 'unidad', 'status'));
    }
}
