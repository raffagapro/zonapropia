<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Inmobiliaria;
use App\Models\Proyecto;


class InmobiliariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
      $inmos = Inmobiliaria::paginate(25);
      return view('admin.inmo.index')->with(compact('inmos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
      return view('admin.inmo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
      $validated = $request->validate([
        'nombre'=>'required',
        'logo'=>'required',
      ]);
      if ($request->hasFile('logo')) {
        if ($request->file('logo')->isValid()) {
          $validated = $request->validate([
            'nombre'=>'string|max:40|unique:inmobiliarias,name',
            'logo'=>'mimes:jpeg,png|max:5000',
          ]);
          $extension = $request->logo->extension();
          $request->logo->storeAs('/public/inmo_logos', 'logo_'.$request->nombre.".".$extension);
          $url = Storage::url('inmo_logos/logo_'.$request->nombre.".".$extension);
          $destacar = 0;
          if ($request->has('destacar')) {
            $destacar = 1;
          }
          Inmobiliaria::create([
            'name' => $request->nombre,
            'logo' => $url,
            'destacar' => $destacar,
          ]);
        }
        $status = 'La inmobiliaria se ha agregado exitosamente.';
        $inmos = Inmobiliaria::paginate(25);
        return view('admin.inmo.index')->with(compact('inmos', 'status'));
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
      $inmo = Inmobiliaria::findOrFail($id);
      $proyects = $inmo->proyects()->paginate(25);
      return view('admin.inmo.edit')->with(compact('inmo', 'proyects'));
    }

    public function show($id){
      $inmo= Inmobiliaria::findOrFail($id);
      $inmo->destacar = 1;
      $inmo->save();
      $inmos = Inmobiliaria::paginate(25);
      return back()->with(compact('inmos'));
    }

    public function hide($id){
      $inmo= Inmobiliaria::findOrFail($id);
      $inmo->destacar = 0;
      $inmo->save();
      $inmos = Inmobiliaria::paginate(25);
      return back()->with(compact('inmos'));
    }

    public function search(Request $request){
      $inmo = Inmobiliaria::findOrFail($request->inmo_id);
      $proyects = $inmo->proyects()->paginate(25);
      if ($request->search !== null) {
        $searched = Proyecto::where('name', 'LIKE', '%'.$request->search.'%')
         ->where('estado_id', 1)->get();
        return view('admin.inmo.edit')->with(compact('searched', 'inmo', 'proyects'));
      }
      return view('admin.inmo.edit')->with(compact('inmo', 'proyects'));
    }

    public function addProject(Request $request){
      $inmo = Inmobiliaria::findOrFail($request->inmo_id);
      $proyect = Proyecto::findOrFail($request->proyect_id);
      $inmo->proyects()->save($proyect);
      $proyects = $inmo->proyects()->paginate(25);
      return view('admin.inmo.edit')->with(compact('inmo', 'proyects'));
    }

    public function rmProject($id, $inmo_id){
      $inmo = Inmobiliaria::findOrFail($inmo_id);
      $proyect = Proyecto::findOrFail($id);
      $proyect->inmobiliaria()->dissociate();
      $proyect->save();
      $proyects = $inmo->proyects()->paginate(25);
      return view('admin.inmo.edit')->with(compact('inmo', 'proyects'));
    }

    public function filter(Request $request){
      if ($request->search !== null) {
        $inmos = Inmobiliaria::where('name', 'LIKE', '%'.$request->search.'%')
          ->paginate(25);
      } else {
        $inmos = Inmobiliaria::paginate(25);
      }
      $searched = $request->search;
      return view('admin.inmo.index')->with(compact(
        'inmos',
        'searched',
      ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
      $validated = $request->validate([
        'nombre'=>'required',
        'logo'=>'required',
      ]);
      $inmo = Inmobiliaria::findOrFail($id);
      $inmo->name = $request->nombre;
      if ($request->has('destacar')) {
        $inmo->destacar = 1;
      }else {
        $inmo->destacar = 0;
      }
      if ($request->hasFile('logo')) {
        if ($request->file('logo')->isValid()) {
          $validated = $request->validate([
            'nombre'=>'string|max:40',
          ]);
          //erases previos logo
          $delInmo = str_replace('/storage/', "",$inmo->logo);
          Storage::delete('public/'.$delInmo);
          //saves new one
          $extension = $request->logo->extension();
          $request->logo->storeAs('/public/inmo_logos', 'logo_'.$request->nombre.".".$extension);
          $url = Storage::url('inmo_logos/logo_'.$request->nombre.".".$extension);
          $inmo->logo = $url;
        }
      }

      $inmo->save();
      $status = 'La inmobiliaria ha sido actualizada exitosamente.';
      return back()->with(compact('inmo', 'status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $inmo = Inmobiliaria::findOrFail($id);
      $delInmo = str_replace('/storage/', "",$inmo->logo);
      Storage::delete('public/'.$delInmo);
      $inmo->delete();
      $status = 'La inmobiliaria ha sido eliminada exitosamente.';
      $inmos = Inmobiliaria::paginate(25);
      return back()->with(compact('inmos', 'status'));
    }
}
