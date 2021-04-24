<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Caracteristica;
use App\Models\Proyecto;
use App\Models\Media_Cara;
use App\Models\Categoria;
use App\Models\Inmobiliaria;
use App\Models\Region;
use App\Models\Taggable;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $caracs = Caracteristica::paginate(25);
      return view('admin.caracs.index')->with(compact('caracs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      Caracteristica::create([
        'name' => $request->nombre,
        'icono' => $request->icono,
        'descripcion' => $request->descripcion,
      ]);
      $status = 'La caracteristica ha sido guardada exitosamente.';
      $caracs = Caracteristica::paginate(25);
      return back()->with(compact('caracs', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $car = Caracteristica::findOrFail($id);
      return view('admin.caracs.edit')->with(compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $car = Caracteristica::findOrFail($id);
      $car->name = $request->nombre;
      $car->icono = $request->icono;
      $car->descripcion = $request->descripcion;
      $car->save();
      $status = 'La caracteristica ha sido actualizada exitosamente.';
      return back()->with(compact('car', 'status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $car = Caracteristica::findOrFail($id);
      $proyects = $car->proyects;
      // removes proyects associated
      foreach ($proyects as $pro) {
        $pro->caracteristicas()->detach($car);
      }
      //removes media associated
      foreach ($car->media_cara as $mc) {
        Storage::delete('public/'.$mc->loc);
        //erase record from DB
        $mc->delete();
      }
      $car->delete();
      $status = 'La caracteristica ha sido eliminada exitosamente.';
      $caracs = Caracteristica::paginate(25);
      return back()->with(compact('caracs', 'status'));
    }

    public function addMedia(Request $request){
      // dd($request->all());
      $car = Caracteristica::findOrFail($request->char_id);
      $proyect = Proyecto::findOrFail($request->proyect_id);
      if ($request->hasFile('charImg')) {
        if ($request->file('charImg')->isValid()) {
          $validated = $request->validate([
            'charImg'=>'mimes:jpeg,png|max:1000',
          ]);
          //nueva img
          $mc = Media_Cara::create([
            'name' => 'temp',
            'loc' => 'temp'
          ]);
          $extension = $request->charImg->extension();
          $request->charImg->storeAs('/public/chars', 'char_'.$car->id.'_pro_'.$proyect->id.'_m_'.$mc->id.'.'.$extension);
          $url = Storage::url('chars/char_'.$car->id.'_pro_'.$proyect->id.'_m_'.$mc->id.'.'.$extension);
          $url = str_replace('/storage/', "",$url);
          $mc->name = 'char_'.$car->id.'_pro_'.$proyect->id.'_m_'.$mc->id;
          $mc->loc = $url;
          $mc->save();

          $proyect->media_cara()->save($mc);
          $car->media_cara()->save($mc);
          $status = 'La imagen ha sido guardada.';
          return redirect()->route('aProyect.edit', $proyect->id)->with(compact('status'));
        }
      }
    }

    public function rmMedia($id){
      $mc = Media_Cara::findOrFail($id);
      $proyect_id = $mc->proyecto_id;
      //erase file from store
      Storage::delete('public/'.$mc->loc);
      //erase record from DB
      $mc->delete();
      $proyect = Proyecto::findOrFail($proyect_id);
      // dd($proyect);
      $status = 'La imagen ha sido eliminada.';
      return redirect()->route('aProyect.edit', $proyect->id)->with(compact('status'));
    }
}
