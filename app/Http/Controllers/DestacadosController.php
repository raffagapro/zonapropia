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
      $dests = Destacado::paginate(25);
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
      $dest = new Destacado();
      $dest->save();
      $proyect->destacado()->save($dest);
      $dests = Destacado::paginate(25);
      $status = 'El proyecto se ha agregado exitosamente.';
      return view('admin.dest.index')->with(compact('dests', 'status'));
    }
    public function remove($id)
    {
      $dest = Destacado::findOrFail($id);
      $dest->delete();
      $dests = Destacado::paginate(25);
      $status = 'El proyecto se ha removido exitosamente.';
      return view('admin.dest.index')->with(compact('dests', 'status'));
    }
}
