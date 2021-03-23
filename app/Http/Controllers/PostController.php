<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Taggable;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(25);
        return view('admin.blog.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->titulo,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'video' => $request->video,
        ]);
        $status = 'El post ha sido creado exitosamente.';
        return redirect()->route('post.edit', $post->id)->with(compact('status'));
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
        $post = Post::findOrFail($id);
        return view('admin.blog.edit')
          ->with(compact(
            'post',
        ));
    }

    public function addTag(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $tag = Taggable::findOrFail($request->tag);
        if (!$post->tags()->where('name', $tag->name)->first()) {
          $post->tags()->attach($tag);
          $status = 'El Tag ha sido agregado.';
        }else {
          $status = 'El Tag ya se esta asociado con el proyecto.';
        }
        return redirect()->route('post.edit', $post->id)->with(compact('status'));
    }
  
    public function rmTag($id, $tag_id)
    {
        $post = Post::findOrFail($id);
        $tag = Taggable::findOrFail($tag_id);
        $post->tags()->detach($tag);
        $status = 'El tag ha sido eliminado.';
        return redirect()->route('post.edit', $post->id)->with(compact('status'));
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
        $post = Post::findOrFail($id);
        $post->title = $request->titulo;
        $post->subtitle = $request->subtitle;
        $post->video = $request->video;
        $post->body = $request->body;
        $post->save();
        $status = 'El proyecto ha sido actualizado exitosamente.';
        return redirect()->route('post.edit', $post->id)->with(compact('status'));
    }

    public function storeBanner(Request $request)
    {
        // dd($request->all());
        $post = Post::findOrFail($request->post_id);
        if ($post->banner) {
            //erases previos image
            $delInmo = str_replace('/storage/', "",$post->banner);
            Storage::delete('public/'.$delInmo);
        }
        // dd($proyect->proyectHasMedia($request->name));
        if ($request->hasFile('banner')) {

            if ($request->file('banner')->isValid()) {
                $validated = $request->validate([
                'banner'=>'mimes:jpeg,png|max:2000',
                ]);
                $extension = $request->banner->extension();
                $request->banner->storeAs('/public/posts', $request->name.'_'.$post->id.".".$extension);
                $url = Storage::url('posts/'.$request->name.'_'.$post->id.".".$extension);
                $post->banner = $url;
                $post->save();
            }
            //call proyect again with new image
            $post = Post::findOrFail($request->post_id);
            $status = 'La imagen ha sido guardada exitosamente.';
            return redirect()->route('post.edit', $post->id)->with(compact('status'));
        }
    }

    public function storePrincipal(Request $request)
    {
        // dd($request->all());
        $post = Post::findOrFail($request->post_id);
        if ($post->media1) {
          //erases previos image
          $delInmo = str_replace('/storage/', "",$post->media1);
          Storage::delete('public/'.$delInmo);
        }
        // dd($proyect->proyectHasMedia($request->name));
        if ($request->hasFile('main')) {
          if ($request->file('main')->isValid()) {
            $validated = $request->validate([
                'main'=>'mimes:jpeg,png|max:1000',
            ]);
            $extension = $request->main->extension();
            $request->main->storeAs('/public/posts', $request->name.'_'.$post->id.".".$extension);
            $url = Storage::url('posts/'.$request->name.'_'.$post->id.".".$extension);
            $post->media1 = $url;
            $post->save();

            // dd('imagen valida')
          }
          //call proyect again with new image
          $post = Post::findOrFail($request->post_id);
          $status = 'La imagen ha sido guardada exitosamente.';
          return redirect()->route('post.edit', $post->id)->with(compact('status'));
        }
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
