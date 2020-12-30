<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;


class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $notices = Notice::paginate(25);
      return view('admin.notices.index')->with(compact('notices'));
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
      Notice::create([
        'title' => $request->titulo,
        'body' => $request->mensaje,
        'status' => 1,
      ]);
      $status = 'El anuncio ha sido guardado exitosamente.';
      $notices = Notice::paginate(25);
      return back()->with(compact('notices', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $notice = Notice::findOrFail($id);
      return view('admin.notices.edit')->with(compact('notice'));
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
      $notice = Notice::findOrFail($id);
      $notice->title = $request->titulo;
      $notice->body = $request->mensaje;
      $notice->save();
      $status = 'El anuncio ha sido actualizado exitosamente.';
      return back()->with(compact('notice', 'status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $notice = Notice::findOrFail($id);
      $notice->delete();
      $status = 'El anuncio ha sido eliminado exitosamente.';
      $notices = Notice::paginate(25);
      return back()->with(compact('notices', 'status'));
    }
}
