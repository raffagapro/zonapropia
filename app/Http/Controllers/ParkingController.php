<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Estacionamiento;
use App\Models\Unidad;

class ParkingController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   
        $validated = $request->validate([
            'floorName' => 'required|max:255',
            'parkingFlo' => 'required',
        ]);
        $proyect = Proyecto::findOrFail($id);
        $pSpot = Estacionamiento::create([
            'name' => $request->floorName,
            'piso' => $request->parkingFlo,
            'status' => 1,
        ]);
        $proyect->estacionamientos()->save($pSpot);
        // dd($proyect->name);
        $status = 'El estacionamiento has sido creado.';
        return back()->with(compact('status'));
    }

    public function parkingOcupado($id)
    {
        // dd($id);
        $pSpot = Estacionamiento::findOrFail($id);
        $pSpot->status = 0;
        $pSpot->save();
        return back();
    }

    public function parkingDisponible($id)
    {
        // dd($id);
        $pSpot = Estacionamiento::findOrFail($id);
        $pSpot->status = 1;
        $pSpot->save();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pSpot = Estacionamiento::findOrFail($id);
        // dd($pSpot);
        return view('admin.proyects.parking.edit')->with(compact('pSpot'));
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
        // dd($request->all());
        $validated = $request->validate([
            'nombre' => 'required|max:255',
            'piso' => 'required',
        ]);
        $pSpot = Estacionamiento::findOrFail($id);
        $pSpot->name = $request->nombre;
        $pSpot->piso = $request->piso;
        $pSpot->status = $request->status;
        if ($request->unidad !== null) {
            if ((int)$request->unidad === 0) {
                // dd('hola k aze?');
                $pSpot->unidad()->dissociate();
                // $unidad = Unidad::findOrFail($pSpot->unidad->id);
                // $unidad->estacionamientos()->detach($pSpot->id);
            } else {
                $unidad = Unidad::findOrFail($request->unidad);
                $unidad->estacionamientos()->save($pSpot);
            }
        }
        $pSpot->save();
        $pSpot = Estacionamiento::findOrFail($id);
        $status = 'El estacionamiento ha sido actualizado exitosamente.';
        return back()->with(compact('status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pSpot = Estacionamiento::findOrFail($id);
        $pSpot->delete();
        $status = 'El estacionamiento has sido eliminado.';
        return back()->with(compact('status'));
    }
}
