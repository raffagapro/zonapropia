<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Unidad;
use Illuminate\Support\Facades\Auth;


class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyect = Proyecto::findOrFail($id);
        $similares = Proyecto::where('comuna_id', $proyect->comuna->id)->paginate(3);
        // dd($similares);
        return view('proyect.index')
        ->with(compact('proyect', 'similares'));
    }

    public function unitSwitcher(Request $request)
    {
        $unidad = Unidad::findOrFail($request->unidadId);
        $tipologias = $unidad->tipologias;
        return [$tipologias, $unidad];
    }

    public function tipoSwitcher(Request $request)
    {
        $tipoSelected = explode(',', $request->tipoSelected);
        $selectedUnits = Unidad::where('dormitorios', $tipoSelected[0])
          ->Where('banos', 'LIKE', $tipoSelected[1])
          ->get();
        return $selectedUnits;
    }

    public function oriSwitcher(Request $request)
    {
        $oriSelected = $request->ori;
        $selectedUnits = Unidad::where('orientacion', $oriSelected)->get();
        return $selectedUnits;
    }

    public function pisoSwitcher(Request $request)
    {
        $pisoSelected = $request->piso;
        $selectedUnits = Unidad::where('piso', $pisoSelected)->get();
        return $selectedUnits;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
