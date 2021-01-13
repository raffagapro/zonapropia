<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Proyecto;
use App\Models\Media;
use App\Models\Region;
use App\Models\Inmobiliaria;
use App\Models\Categoria;
use App\Models\Taggable;


class MediaController extends Controller
{

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function storeBanner(Request $request){
       // dd($request->all());
       $proyect = Proyecto::findOrFail($request->proyect_id);
       if ($proyect->proyectHasMedia($request->name)) {
         //erases previos image
         $mediaz = $proyect->media->where('name', 'banner')->first();
         $delInmo = str_replace('/storage/', "",$mediaz->loc);
         Storage::delete('public/'.$delInmo);
         $mediaz->delete();
       }
       // dd($proyect->proyectHasMedia($request->name));
       if ($request->hasFile('banner')) {
         if ($request->file('banner')->isValid()) {
           $validated = $request->validate([
             'banner'=>'mimes:jpeg,png|max:3000',
           ]);
           $extension = $request->banner->extension();
           $request->banner->storeAs('/public/media', $request->name.'_'.$proyect->id.".".$extension);
           $url = Storage::url('media/'.$request->name.'_'.$proyect->id.".".$extension);
           $proyect->Media()->save(new Media([
             'name' => $request->name,
             'loc' => $url,
           ]));
         }
         //call proyect again with new image
         $proyect = Proyecto::findOrFail($request->proyect_id);
         $status = 'La imagen ha sido guardada exitosamente.';
         $cats = Categoria::all();
         $inmos = Inmobiliaria::all();
         $regions = Region::all();
         $tags = Taggable::all();
         return view('admin.proyects.edit')
           ->with(compact('proyect', 'status', 'cats', 'inmos', 'regions', 'tags'));
       }
     }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function storeMain(Request $request){
      // dd($request->all());
      $proyect = Proyecto::findOrFail($request->proyect_id);
      if ($proyect->proyectHasMedia($request->name)) {
        //erases previos image
        $mediaz = $proyect->media->where('name', 'main')->first();
        $delInmo = str_replace('/storage/', "",$mediaz->loc);
        Storage::delete('public/'.$delInmo);
        $mediaz->delete();
      }
      // dd($proyect->proyectHasMedia($request->name));
      if ($request->hasFile('main')) {
        if ($request->file('main')->isValid()) {
          $validated = $request->validate([
            'banner'=>'mimes:jpeg,png|max:1000',
          ]);
          $extension = $request->main->extension();
          $request->main->storeAs('/public/media', $request->name.'_'.$proyect->id.".".$extension);
          $url = Storage::url('media/'.$request->name.'_'.$proyect->id.".".$extension);
          $proyect->Media()->save(new Media([
            'name' => $request->name,
            'loc' => $url,
          ]));
        }
        //call proyect again with new image
        $proyect = Proyecto::findOrFail($request->proyect_id);
        $status = 'La imagen ha sido guardada exitosamente.';
        $cats = Categoria::all();
        $inmos = Inmobiliaria::all();
        $regions = Region::all();
        $tags = Taggable::all();
        return view('admin.proyects.edit')
          ->with(compact('proyect', 'status', 'cats', 'inmos', 'regions', 'tags'));
      }
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function storeMedia(Request $request){
     // dd($request->all());
     $proyect = Proyecto::findOrFail($request->proyect_id);
     if ($request->hasFile('media')) {
       if ($request->file('media')->isValid()) {
         $validated = $request->validate([
           'media'=>'mimes:jpeg,png|max:1000',
         ]);
         // dd($request->file('media')->getClientOriginalName());
         $extension = $request->media->extension();
         //grab original name and remove ext
         $originalName = $request->file('media')->getClientOriginalName();
         $originalName = str_replace('.'.$extension, "",$originalName);
         $request->media->storeAs('/public/media', $request->name.'_'.$proyect->id."_".$originalName.".".$extension);
         $url = Storage::url('media/'.$request->name.'_'.$proyect->id."_".$originalName.".".$extension);
         $proyect->Media()->save(new Media([
           'name' => $request->name,
           'loc' => $url,
         ]));
       }
       //call proyect again with new image
       $proyect = Proyecto::findOrFail($request->proyect_id);
       $status = 'La imagen ha sido guardada exitosamente.';
       $cats = Categoria::all();
       $inmos = Inmobiliaria::all();
       $regions = Region::all();
       $tags = Taggable::all();
       return view('admin.proyects.edit')
         ->with(compact('proyect', 'status', 'cats', 'inmos', 'regions', 'tags'));
     }
   }

    public function delMedia($media_id, $proyect_id)
    {
      $proyect = Proyecto::findOrFail($proyect_id);
      //erase file from store
      $media = $proyect->media->where('id', $media_id)->first();
      $delInmo = str_replace('/storage/', "",$media->loc);
      Storage::delete('public/'.$delInmo);
      //erase record from DB
      $media->delete();
      //call proyect again with new image
      $proyect = Proyecto::findOrFail($proyect_id);
      $status = 'La imagen ha sido guardada exitosamente.';
      $cats = Categoria::all();
      $inmos = Inmobiliaria::all();
      $regions = Region::all();
      $tags = Taggable::all();
      return view('admin.proyects.edit')
        ->with(compact('proyect', 'status', 'cats', 'inmos', 'regions', 'tags'));
    }
}
