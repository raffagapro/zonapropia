<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Proyecto;
use App\Models\User;
use App\Models\Region;
use App\Models\Comuna;
use App\Models\Taggable;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;


class ProyectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $aUser = Auth::user();
        // $aUser = User::findOrFail(1);
        // dd($aUser->proyects);
        $proyectos = Proyecto::where('estado_id', 1)->paginate(25);
        // dd($proyectos);
        return view('proyects.index')
            ->with(compact('proyectos'));
    }

    public function search(Request $request){
        // dd($request->all());
        $tag = ($request->tag) ? Taggable::findOrFail((int)$request->tag) : null;
        $cat = ($request->cat) ? Categoria::findOrFail((int)$request->cat) : null;
        $comuna = ($request->comuna) && ($request->comuna !== "z") ? Comuna::findOrFail((int)$request->comuna) : null;
        $region = ($request->region) && ($request->region !== "z") ? Region::findOrFail((int)$request->region) : null;

        $proyectos = Proyecto::when($region, function($q, $region){
            return $q->whereHas(
                'region', function($q) use ($region){
                    $q->where('region_id', $region->id);
                }
            );
        })->when($comuna, function($q, $comuna){
            return $q->whereHas(
                'comuna', function($q) use ($comuna){
                    $q->where('comuna_id', $comuna->id);
                }
            );
        })->when($tag, function($q, $tag){
            return $q->whereHas(
                'tags', function($q) use ($tag){
                    $q->where('taggable_id', $tag->id);
                }
            );
        })->when($cat, function($q, $cat){
            return $q->whereHas(
                'categoria', function($q) use ($cat){
                    $q->where('categoria_id', $cat->id);
                }
            );
        })->paginate(25);
        // dd($proyectos->first()->getUF());
        return view('proyects.index')
        ->with(compact('proyectos', 'tag', 'cat', 'comuna', 'region'));
    }

    public function comunaGrabber(Request $request){
        $region = Region::findOrFail($request->region);
        $comunas = $region->getComunas();
        return $comunas;
    }

    public function likeProyect($pId, $uId){
        // dd('hola crayola');
        // dd($pId, $uId);
        $proyect = Proyecto::findOrFail($pId);
        $user = User::findOrFail($uId);
        $proyect->users()->attach($user);
        return back();
    }
  
    public function unlikeProyect($pId, $uId){
        $proyect = Proyecto::findOrFail($pId);
        $user = Taggable::findOrFail($uId);
        $proyect->users()->detach($user);
        return back();
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
