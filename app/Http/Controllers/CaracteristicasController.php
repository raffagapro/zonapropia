<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caracteristica;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $caracs = Caracteristica::paginate(25);
      return view('admin.caracs.index')->with(compact('caracs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function edit($id)
    {
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
    public function update(Request $request, $id)
    {
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
    public function destroy($id)
    {
      $car = Caracteristica::findOrFail($id);
      //missing code for deliting media associated with the charac
      $car->delete();
      $status = 'La caracteristica ha sido eliminada exitosamente.';
      $caracs = Caracteristica::paginate(25);
      return back()->with(compact('caracs', 'status'));
    }
}
