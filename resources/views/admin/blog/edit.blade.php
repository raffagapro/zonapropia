@extends('layouts.adminDashboard')
@section('title', 'Modificar Post')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $post->title }}&nbsp</h2>
        <a href="{{ route('post.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Posts.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Modificar Post</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Nombre --}}
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo"
                class="form-control @error('titulo') is-invalid @enderror"
                placeholder="Titutlo" value="{{ $post->title }}"
              >
              @error('titulo')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Subtitle --}}
            <div class="form-group">
              <label for="subtitle">Subtitulo</label>
              <input type="text" name="subtitle"
                class="form-control @error('subtitle') is-invalid @enderror"
                placeholder="Dirección" value="{{ $post->subtitle }}"
              >
              @error('subtitle')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Video --}}
            <div class="form-group">
              <label for="video">Video</label>
              <input type="text" name="video"
                class="form-control @error('video') is-invalid @enderror"
                placeholder="Video Link" value="{{ $post->video }}"
              >
              @error('video')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Texto --}}
            <div class="form-group">
              <label for="body">Texto </label>
              <small>( [p] = Párrafo )</small>
              <textarea class="form-control" name="body" rows="8"
                placeholder="Descripción del proyecto"
              >{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
          </form>
        </div>
      </div>

      {{-- Tags Section --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Tags</h4>
        {{-- Tags Form --}}
        <div class="container">
          <form action="{{ route('post.addTag', $post->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8 col-lg-10">
                <select class="form-control" name="tag">
                  <option selected disabled>Seleccionar Tag</option>
                  @foreach (App\Models\Taggable::all() as $tag)
                    @if ($tag->visibility !== 1)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-lg-2">
                <button type="submit" class="btn bg-main-color btn-block navBar-btn text-light mt-3 mt-md-0 mb-3">Agregar Tag</button>
              </div>
            </div>
            <div class="mb-3">
              @foreach ($post->tags as $tag)
                <span class="badge badge-primary">
                  <a href="{{ route('post.rmTag', [$post->id, $tag->id]) }}"><i class="fas fa-times text-danger"></i></a>
                  {{ $tag->name }}
                </span>
              @endforeach
            </div>
          </form>
        </div>
      </div>

      {{-- Images --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Media</h4>
        {{-- General info --}}
        <div class="container">
          {{-- Baner --}}
          <form
            action="{{ route('post.storeBanner', $post->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="banner">Banner (1920 × 927px, 2MB max, jpeg, png)</label><br>
              @if ($post->banner)
                <img src="{{ asset($post->banner) }}" class="mediaProyect mb-2">
                {{-- <h1>{{ $proyect->media->where('name', 'banner')->first()->loc }}</h1> --}}
              @endif
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <input type="hidden" name="name" value="banner_post">
              <input
                type="file"
                class="form-control-file @error('banner') is-invalid @enderror"
                name="banner"/>
              @error('banner')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="text-right">
              <button type="submit" class="btn bg-main-color navBar-btn text-light">Guardar</button>
            </div>
          </form>
          <hr>
          {{-- Principal --}}
          <form
            action="{{ route('post.storeMain', $post->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="image">Principal (600 × 400px, 1MB max, jpeg, png)</label><br>
              @if ($post->media1)
                <img src="{{ asset($post->media1) }}" class="mediaProyect mb-2">
              @endif
              <input type="hidden" name="name" value="main">
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <input
                type="file"
                class="form-control-file @error('main') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="main"/>
              @error('main')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="text-right">
              <button type="submit" class="btn bg-main-color navBar-btn text-light">Guardar</button>
            </div>
          </form>
          <hr>
        </div>
      </div>


    </div>
  </div>

  <!-- Modal caracteristic image -->
  <div class="modal fade" id="charImgModal" tabindex="-1" role="dialog" aria-labelledby="charImgModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Imagen</h5>
        </div>
        <div class="modal-body">
          <form
            action="{{ route('caracs.addMedia') }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="charImg">Imagen (1920 × 927px, 3MB max, jpeg, png)</label><br>
              <input type="hidden" name="proyect_id" value="{{ $post->id }}">
              <input type="hidden" name="char_id" id="char_id" value="">
              <input
                type="file"
                class="form-control-file @error('charImg') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="charImg"/>
              @error('charImg')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="text-right">
              <button type="submit" class="btn bg-main-color navBar-btn text-light">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
  @isset($status)
    <x-sweet-alert-admin :message="$status"/>
  @endisset
@endsection

@section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/regionSwitcherEdit.js') }}" ></script>
@endsection
