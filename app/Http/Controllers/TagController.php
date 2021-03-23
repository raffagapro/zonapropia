<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taggable;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tags = Taggable::paginate(25);
      return view('admin.tags.index')->with(compact('tags'));
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
      Taggable::create([
        'name' => $request->nombre,
        'color' => $request->color,
        'visibility' => $request->vis,
      ]);
      $status = 'El tag ha sido guardado exitosamente.';
      $tags = Taggable::paginate(25);
      return back()->with(compact('tags', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tag = Taggable::findOrFail($id);
      return view('admin.tags.edit')->with(compact('tag'));
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
      $tag = Taggable::findOrFail($id);
      $tag->name = $request->nombre;
      $tag->color = $request->color;
      $tag->visibility = $request->vis;
      $tag->save();
      $status = 'El tag ha sido actualizado exitosamente.';
      return back()->with(compact('tag', 'status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tag = Taggable::findOrFail($id);
      $tag->delete();
      $status = 'El tag ha sido eliminado exitosamente.';
      $tags = Taggable::paginate(25);
      return back()->with(compact('tags', 'status'));
    }
}
