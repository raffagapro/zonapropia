<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destacado;
use App\Models\Proyecto;


class DestacadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dests = Destacado::orderBy('orden')->paginate(25);
      return view('admin.dest.index')->with(compact('dests'));
    }

    public function search(Request $request)
    {
      $dests = Destacado::paginate(25);
      if ($request->search !== null) {
        $searched = Proyecto::where('name', 'LIKE', '%'.$request->search.'%')
         ->where('estado_id', 1)->get();
        return view('admin.dest.index')->with(compact('dests', 'searched'));
      }
      return back()->with(compact('dests'));
    }

    public function add($id)
    {
      $proyect = Proyecto::findOrFail($id);
      $dt = Destacado::all();
      $go = true;
      foreach ($dt as $dti) {
        if ((int)$dti->proyecto->id === (int)$id) {
          $go = false;
          break;
        }
      }
      if ($go) {
        $ordenList = [];
        foreach ($dt as $dti) {
          array_push($ordenList, $dti->orden);
        }
        $dest = new Destacado();
        if (count($ordenList) === 0) {
          $newOrden = 1;
        }else {
          $newOrden = end($ordenList)+1;
        }
        // dd($newOrden);
        $dest->orden = $newOrden;
        $dest->save();
        $proyect->destacado()->save($dest);
      }
      $status = 'El proyecto se ha agregado exitosamente.';
      $dests = Destacado::orderBy('orden')->paginate(25);
      return view('admin.dest.index')->with(compact('dests', 'status'));
    }

    public function remove($id){
      $dest = Destacado::findOrFail($id);
      $dest->delete();
      $dests = Destacado::orderBy('orden')->paginate(25);
      $status = 'El proyecto se ha removido exitosamente.';
      return view('admin.dest.index')->with(compact('dests', 'status'));
    }

    public function up($id){
      $dest = Destacado::findOrFail($id);
      $fn = $dest->orden-1;
      if ($fn > 0) {
        $destFinal = Destacado::where('orden', $fn)->first();
        $dest->orden = $fn;
        $dest->save();
        if ($destFinal !== null) {
          $destFinal->orden = $fn+1;
          $destFinal->save();
        }
      }
      // dd($destFinal);
      $dests = Destacado::orderBy('orden')->paginate(25);
      $status = 'El proyecto se ha removido exitosamente.';
      return view('admin.dest.index')->with(compact('dests', 'status'));
    }

    public function down($id){
      $dest = Destacado::findOrFail($id);
      $dests = Destacado::all();
      $fn = $dest->orden+1;
      if ($fn < count($dests)+1) {
        $destFinal = Destacado::where('orden', $fn)->first();
        $dest->orden = $fn;
        $dest->save();
        if ($destFinal !== null) {
          $destFinal->orden = $fn-1;
          $destFinal->save();
        }
      }
      // dd($destFinal);
      $dests = Destacado::orderBy('orden')->paginate(25);
      $status = 'El proyecto se ha removido exitosamente.';
      return view('admin.dest.index')->with(compact('dests', 'status'));
    }
}
