<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Categoria::paginate(25);
      return view('admin.categorias.index')->with(compact('categories'));
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
      Categoria::create([
        'name' => $request->nombre,
      ]);
      $status = 'La categoria ha sido guardada exitosamente.';
      $categories = Categoria::paginate(25);
      return back()->with(compact('categories', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Categoria::findOrFail($id);
      return view('admin.categorias.edit')->with(compact('category'));
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
      $category = Categoria::findOrFail($id);
      $category->name = $request->nombre;
      $category->save();
      $status = 'La categoria ha sido actualizada exitosamente.';
      return back()->with(compact('category', 'status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $category = Categoria::findOrFail($id);
      $category->delete();
      $status = 'La categoria ha sido eliminada exitosamente.';
      $categories = Categoria::paginate(25);
      return back()->with(compact('categories', 'status'));
    }
}
