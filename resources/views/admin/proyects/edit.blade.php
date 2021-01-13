@extends('layouts.adminDashboard')
@section('title', 'Modificar Proyecto')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $proyect->name }}&nbsp</h2>
        <a href="{{ route('aProyect.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Proyectos.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Modificar Proyecto</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('aProyect.update', $proyect->id) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- Nombre --}}
            <div class="form-group">
              <input type="text" name="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                placeholder="Nombre" value="{{ $proyect->name }}"
              >
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Direccion --}}
            <div class="form-group">
              <input type="text" name="direccion"
                class="form-control @error('direccion') is-invalid @enderror"
                placeholder="Dirección" value="{{ $proyect->direccion }}"
              >
              @error('direccion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Reg/Comuna/ciudad --}}
            <div class="form-group row">
              {{-- Region --}}
              <div class="col-4">
                <select class="form-control" name="region">
                  @foreach ($regions as $region)
                    @if ((int)$proyect->region->id === (int)$region->id)
                      <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                    @else
                      <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              {{-- Comuna --}}
              <div class="col-4">
                <input type="text" name="comuna"
                  class="form-control @error('comuna') is-invalid @enderror"
                  placeholder="Comuna" value="{{ $proyect->comuna }}"
                >
                @error('comuna')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Ciudad --}}
              <div class="col-4">
                <input type="text" name="ciudad"
                  class="form-control @error('ciudad') is-invalid @enderror"
                  placeholder="Ciudad" value="{{ $proyect->ciudad }}"
                >
                @error('ciudad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- long/lat/inmo --}}
            <div class="form-group row">
              {{-- Latitud --}}
              <div class="col-4">
                <input type="text" name="latitud"
                  class="form-control @error('latitud') is-invalid @enderror"
                  placeholder="Latitud" value="{{ $proyect->latitud }}"
                >
                @error('latitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Longitud --}}
              <div class="col-4">
                <input type="text" name="longitud"
                  class="form-control @error('longitud') is-invalid @enderror"
                  placeholder="Longitud" value="{{ $proyect->longitud }}"
                >
                @error('longitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Inmobiliarias --}}
              <div class="col-4">
                <select class="form-control" name="inmo">
                  <option  value=0 >Sin Inmobiliaria</option>
                  @foreach ($inmos as $inmo)
                    @if ($proyect->inmobiliaria !== null)
                      @if ((int)$proyect->inmobiliaria->id === (int)$inmo->id)
                        <option value="{{ $inmo->id }}" selected>{{ $inmo->name }}</option>
                      @else
                        <option value="{{ $inmo->id }}">{{ $inmo->name }}</option>
                      @endif
                    @else
                      <option value="{{ $inmo->id }}">{{ $inmo->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
            {{-- cat/cuota/bono pie --}}
            <div class="form-group row">
              {{-- Categories --}}
              <div class="col-4">
                <select class="form-control" name="cat">
                  @foreach ($cats as $cat)
                    @if ((int)$proyect->categoria->id === (int)$cat->id)
                      <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                    @else
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              {{-- Cuota Monto --}}
              <div class="col-4">
                <input type="text" name="cuotaMonto"
                  class="form-control @error('cuotaMonto') is-invalid @enderror"
                  placeholder="Cuota Monto" value="{{ $proyect->cuota_monto }}"
                >
                @error('cuotaMonto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bono Pie Monto --}}
              <div class="col-4">
                <input type="text" name="bonoPieMonto"
                  class="form-control @error('bonoPieMonto') is-invalid @enderror"
                  placeholder="Bono Pie Monto" value="{{ $proyect->bono_pie_monto }}"
                >
                @error('bonoPieMonto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- descripcion --}}
            <div class="form-group">
              <textarea class="form-control" name="descripcion" rows="3"
                placeholder="Descripcion del proyecto"
              >{{ $proyect->descripcion }}</textarea>
            </div>
            {{-- texto descatado --}}
            <div class="form-group">
              <textarea class="form-control" name="textoDestacado" rows="3"
                placeholder="Texto destacado"
              >{{ $proyect->texto_destacado }}</textarea>
            </div>
            {{-- Texto Proyecto --}}
            <div class="form-group">
              <textarea class="form-control" name="textoProyecto" rows="3"
                placeholder="Texto del proyecto"
                >{{ $proyect->texto_proyecto }}</textarea>
            </div>
            {{-- terms --}}
            <div class="form-group">
              <textarea class="form-control" name="terminos" rows="3"
                placeholder="Terminos"
                >{{ $proyect->terminos }}</textarea>
            </div>
            {{-- date/estado/destacado--}}
            <div class="form-group row">
              {{-- fecha limite --}}
              <div class="col-4">
                <input
                  type="text"
                  name="fechaLimite"
                  class="form-control @error('fechaLimite') is-invalid @enderror"
                  placeholder="Fecha Limite" value="{{ $proyect->cuota_pie_fecha_limite }}"
                  onfocus="(this.type='date')"
                  onblur="(this.type='text')"
                >
                @error('fechaLimite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Status --}}
              <div class="col-4">
                <select class="form-control" name="status">
                  <option disabled>Status</option>
                  <option value=0 @if ((int)$proyect->estado_id === 0) selected @endif>Borrador</option>
                  <option value=1 @if ((int)$proyect->estado_id === 1) selected @endif>Publicado</option>
                </select>
              </div>
              {{-- Destacado --}}
              <div class="col-4">
                <select class="form-control" name="destacar">
                  <option disabled>Destacar</option>
                  <option value=0 @if ((int)$proyect->destacado === 0) selected @endif>No</option>
                  <option value=1 @if ((int)$proyect->destacado === 1) selected @endif>Si</option>
                </select>
              </div>
            </div>
            {{-- rooms/bath/MC--}}
            <div class="form-group row">
              {{-- Room Min --}}
              <div class="col-2">
                <input
                  type="number"
                  name="minRoom"
                  min="0"
                  class="form-control @error('minRoom') is-invalid @enderror"
                  placeholder="Dorms Min." value="{{ $proyect->minRooms }}"
                >
                @error('minRoom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Room Max --}}
              <div class="col-2">
                <input
                  type="number"
                  name="maxRoom"
                  min="0"
                  class="form-control @error('maxRoom') is-invalid @enderror"
                  placeholder="Dorms Max" value="{{ $proyect->maxRooms }}"
                >
                @error('maxRoom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bath Min --}}
              <div class="col-2">
                <input
                  type="number"
                  name="minBath"
                  min="0"
                  class="form-control @error('minBath') is-invalid @enderror"
                  placeholder="Baño Min" value="{{ $proyect->minBathrooms }}"
                >
                @error('minBath')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Bath Max --}}
              <div class="col-2">
                <input
                  type="number"
                  name="maxBath"
                  min="0"
                  class="form-control @error('maxBath') is-invalid @enderror"
                  placeholder="Baño Max" value="{{ $proyect->maxBathrooms }}"
                >
                @error('maxBath')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- MC Min --}}
              <div class="col-2">
                <input
                  type="number"
                  name="minMC"
                  min="0"
                  class="form-control @error('minMC') is-invalid @enderror"
                  placeholder="m² Min" value="{{ $proyect->minMC }}"
                >
                @error('minMC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- MC Max --}}
              <div class="col-2">
                <input
                  type="number"
                  name="maxMC"
                  min="0"
                  class="form-control @error('maxMC') is-invalid @enderror"
                  placeholder="m² Max" value="{{ $proyect->maxMC }}"
                >
                @error('maxMC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
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
          <form action="{{ route('aProyect.addTag', $proyect->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8 col-lg-10">
                <select class="form-control" name="tag">
                  <option selected disabled>Seleccionar Tag</option>
                  @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4 col-lg-2">
                <button type="submit" class="btn bg-main-color btn-block navBar-btn text-light mt-3 mt-md-0 mb-3">Agregar Tag</button>
              </div>
            </div>
            <div class="mb-3">
              @foreach ($proyect->tags as $tag)
                <span class="badge badge-primary">
                  <a href="{{ route('aProyect.rmTag', [$proyect->id, $tag->id]) }}"><i class="fas fa-times text-danger"></i></a>
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
            action="{{ route('media.storeBanner', $proyect->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="banner">Banner (1920 × 927px, 3MB max, jpeg, png)</label><br>
              @if ($proyect->proyectHasMedia('banner'))
                <img src="{{ $proyect->media->where('name', 'banner')->first()->loc }}" class="mediaProyect mb-2">
                {{-- <h1>{{ $proyect->media->where('name', 'banner')->first()->loc }}</h1> --}}
              @endif
              <input type="hidden" name="proyect_id" value="{{ $proyect->id }}">
              <input type="hidden" name="name" value="banner">
              <input
                type="file"
                class="form-control-file @error('banner') is-invalid @enderror"
                data-default-file="url_of_your_file"
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
            action="{{ route('media.storeMain', $proyect->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="image">Principal (400 × 550px, 1MB max, jpeg, png)</label><br>
              @if ($proyect->proyectHasMedia('main'))
                <img src="{{ $proyect->media->where('name', 'main')->first()->loc }}" class="mediaProyect mb-2">
                {{-- <h1>{{ $proyect->media->where('name', 'banner')->first()->loc }}</h1> --}}
              @endif
              <input type="hidden" name="name" value="main">
              <input type="hidden" name="proyect_id" value="{{ $proyect->id }}">
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
          {{-- adicionales--}}
          <form
            action="{{ route('media.storeMedia', $proyect->id) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="image">Media (1MB max, jpeg, png)</label><br>
              @foreach ($proyect->media->where('name', 'media')->all() as $media)
                <div class="d-inline">
                  <a href="{{ route('media.delMedia', [$media->id, $proyect->id]) }}" class="imgDelBtn">
                    <i class="fas fa-trash text-danger"></i>
                  </a>
                  {{ str_replace('/storage/media/', "",$media->loc) }}
                  <br>
                  <img src="{{ $media->loc }}" class="mediaProyect mb-2">
                </div>
                <br>
              @endforeach
              <input type="hidden" name="name" value="media">
              <input type="hidden" name="proyect_id" value="{{ $proyect->id }}">
              <input
                type="file"
                class="form-control-file @error('media') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="media"/>
              @error('media')
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
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
