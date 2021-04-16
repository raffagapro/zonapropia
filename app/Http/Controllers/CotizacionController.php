<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\Cotizacion;
use App\Models\Unidad;
use App\Models\User;
use App\Models\Proyecto;
use App\Models\Estacionamiento;
use App\Mail\ContizacionMail;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // dd($id);
        $cotizacion = Cotizacion::findOrFail($id);
        return view('cotizacion.index')->with(compact('cotizacion'));
    }

    public function reserva()
    {
        // dd('hola crayola');
        return view('cotizacion.reserva');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $status = 0;
        $cotizacion = Cotizacion::create([
            'rut' => $request->rut,
            'phone' => $request->phone,
            'status' => $status,
            'email' => $request->email,
            'name' => $request->nombre,
        ]);
        $user = User::findOrFail(Auth::id());
        $user->cotizaciones()->save($cotizacion);
        $unid = Unidad::findOrFail($request->model);
        $unid->cotizaciones()->save($cotizacion);
        $proyect = Proyecto::findOrFail($unid->proyecto->id);
        $proyect->cotizaciones()->save($cotizacion);
        $parking = Estacionamiento::findOrFail($request->estacionamiento);
        $parking->cotizaciones()->save($cotizacion);
        Mail::to($request->email)->send(new ContizacionMail($cotizacion));
        return redirect()->route('cotizacion.exitosa');
    }

    public function success()
    {
        return view('cotizacion.success');
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
