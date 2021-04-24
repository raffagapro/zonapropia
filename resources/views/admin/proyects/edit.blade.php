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
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                placeholder="Nombre" value="{{ $proyect->name }}"
              >
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Direccion --}}
            <div class="form-group">
              <label for="direccion">Direccion</label>
              <input type="text" name="direccion"
                class="form-control @error('direccion') is-invalid @enderror"
                placeholder="Dirección" value="{{ $proyect->direccion }}"
              >
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('direccion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Reg/Comuna --}}
            <div class="form-group row">
              {{-- Region --}}
              <div class="col-6">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <label for="region">Region</label>
                <select class="form-control @error('region') is-invalid @enderror" name="region" id="region">
                  @php $regions = App\Models\Region::all(); @endphp
                  @foreach ($regions as $region)
                    @if ((int)$proyect->region->id === (int)$region->id)
                      <option value="{{ $region->id }}" selected>{{ $region->name }}</option>
                    @else
                      <option value="{{ $region->id }}">{{ $region->name }}</option>
                    @endif
                  @endforeach
                </select>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('region')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              {{-- Comuna --}}
              <div class="col-6">
                <label for="comuna">Comuna</label>
                <select class="form-control @error('comuna') is-invalid @enderror" name="comuna" id="comuna">
                  @foreach ($proyect->provincia->comunas as $comuna)
                    @if ((int)$proyect->comuna->id === (int)$comuna->id)
                      <option value="{{ $comuna->id }}" selected>{{ $comuna->name }}</option>
                    @else
                      <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                    @endif
                  @endforeach
                </select>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('comuna')
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
                <label for="latitud">Latitud</label>
                <input type="text" name="latitud"
                  class="form-control @error('latitud') is-invalid @enderror"
                  placeholder="Latitud" value="{{ $proyect->latitud }}"
                >
                {{--  <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>  --}}
                @error('latitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Longitud --}}
              <div class="col-4">
                <label for="longitud">Longitud</label>
                <input type="text" name="longitud"
                  class="form-control @error('longitud') is-invalid @enderror"
                  placeholder="Longitud" value="{{ $proyect->longitud }}"
                >
                {{--  <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>  --}}
                @error('longitud')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Inmobiliarias --}}
              <div class="col-4">
                <label for="inmo">Inmobiliarias</label>
                <select class="form-control" name="inmo">
                  <option  value=0 >Sin Inmobiliaria</option>
                  @foreach (App\Models\Inmobiliaria::all() as $inmo)
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
                <label for="cat">Categoria</label>
                <select class="form-control @error('cat') is-invalid @enderror" name="cat">
                  @foreach (App\Models\Categoria::all() as $cat)
                    @if ((int)$proyect->categoria->id === (int)$cat->id)
                      <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                    @else
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endif
                  @endforeach
                </select>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('cat')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              {{-- Cuota Monto --}}
              <div class="col-4">
                <label for="cuotaMonto">Monto Cuota</label>
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
                <label for="bonoPieMonto">Bono Pie Monto</label>
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
            {{-- date/estado/destacado--}}
            <div class="form-group row">
              {{-- fecha limite --}}
              <div class="col-4">
                <label for="fechaLimite">Fecha Limite</label>
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
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option disabled>Status</option>
                  <option value=0 @if ((int)$proyect->estado_id === 0) selected @endif>Borrador</option>
                  <option value=1 @if ((int)$proyect->estado_id === 1) selected @endif>Publicado</option>
                </select>
              </div>
              {{-- Destacado --}}
              <div class="col-4">
                <label for="destacar">Destacar</label>
                <select class="form-control" name="destacar">
                  <option disabled>Destacar</option>
                  <option value=0 @if ((int)$proyect->destacado === 0) selected @endif>No</option>
                  <option value=1 @if ((int)$proyect->destacado === 1) selected @endif>Si</option>
                </select>
              </div>
            </div>
            {{-- fecha_entrega/etapa_venta/seguridad--}}
            <div class="form-group row">
              {{-- fecha_entrega --}}
              <div class="col-4">
                <label for="fecha_entrega">Fecha Entrega</label>
                <input
                  type="text"
                  name="fecha_entrega"
                  class="form-control @error('fecha_entrega') is-invalid @enderror"
                  value="{{ $proyect->fecha_entrega }}"
                  onfocus="(this.type='date')"
                  onblur="(this.type='text')"
                >
                @error('fecha_entrega')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- etapa_venta --}}
              <div class="col-4">
                <label for="etapa_venta">Etapa de Venta</label>
                <select class="form-control" name="etapa_venta">
                  <option value=1 @if ((int)$proyect->etapa_venta === 1) selected @endif>Etapa 1</option>
                  <option value=2 @if ((int)$proyect->etapa_venta === 2) selected @endif>Etapa 2</option>
                  <option value=3 @if ((int)$proyect->etapa_venta === 3) selected @endif>Etapa 3</option>
                </select>
              </div>
              {{-- seguridad --}}
              <div class="col-4">
                <label for="seguridad">Seguridad</label>
                <select class="form-control" name="seguridad">
                  <option value=0 @if ((int)$proyect->seguridad === 0) selected @endif>Baja</option>
                  <option value=1 @if ((int)$proyect->seguridad === 1) selected @endif>Media</option>
                  <option value=2 @if ((int)$proyect->seguridad === 2) selected @endif>Alta</option>
                </select>
              </div>
            </div>
            {{-- rooms/bath/MC--}}
            <div class="form-group row">
              {{-- Room Min --}}
              <div class="col-2">
                <label for="minRoom">Dorms Min.</label>
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
                <label for="maxRoom">Dorms Max.</label>
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
                <label for="minBath">Baño Min.</label>
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
                <label for="maxBath">Baño Max.</label>
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
                <label for="minMC">m² Min.</label>
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
                <label for="maxMC">m² Max.</label>
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
            {{-- descripcion --}}
            <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" rows="3"
                placeholder="Descripción del proyecto">{{ $proyect->descripcion }}
              </textarea>
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('descripcion')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- texto descatado --}}
            <div class="form-group">
              <label for="textoDestacado">Texto Destacado</label>
              <textarea class="form-control @error('textoDestacado') is-invalid @enderror" name="textoDestacado" rows="3"
                placeholder="Texto destacado">{{ $proyect->texto_destacado }}
              </textarea>
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('textoDestacado')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- Texto Proyecto --}}
            <div class="form-group">
              <label for="textoProyecto">Texto Proyecto</label>
              <textarea class="form-control @error('textoProyecto') is-invalid @enderror" name="textoProyecto" rows="3"
                placeholder="Texto del proyecto">{{ $proyect->texto_proyecto }}
              </textarea>
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('textoProyecto')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            {{-- terms --}}
            <div class="form-group">
              <label for="terminos">Terminos</label>
              <textarea class="form-control @error('terminos') is-invalid @enderror" name="terminos" rows="3"
                placeholder="Terminos">{{ $proyect->terminos }}
              </textarea>
              <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
              @error('terminos')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
          </form>
        </div>
      </div>

      {{-- Sales Section --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Vendedores</h4>
        {{-- Sales Form --}}
        <div class="container">
          <form action="{{ route('aProyect.addVendedor', $proyect->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8 col-lg-10">
                <select class="form-control @error('vendor') is-invalid @enderror" name="vendor">
                  <option selected disabled>Seleccionar Vendedor</option>
                  @forelse ($vendedores as $v)
                    <option value="{{ $v->id }}">{{ $v->name }}</option>
                  @empty
                  <option selected disabled>Sin vendedores</option>
                  @endforelse
                </select>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('vendor')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-4 col-lg-2">
                <button type="submit" class="btn bg-main-color btn-block navBar-btn text-light mt-3 mt-md-0 mb-3">Agregar Vendedor</button>
              </div>
            </div>
            <div class="mb-3">
              @foreach ($proyect->users as $user)
                @if ($user->hasRole('vendedor'))
                  <span class="badge badge-primary">
                    <a href="{{ route('aProyect.rmVendedor', [$proyect->id, $user->id]) }}"><i class="fas fa-times text-danger"></i></a>
                    {{ $user->name }}
                  </span>
                @endif
              @endforeach
            </div>
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
                <select class="form-control @error('tag') is-invalid @enderror" name="tag">
                  <option selected disabled>Seleccionar Tag</option>
                  @foreach (App\Models\Taggable::all() as $tag)
                    @if ($tag->visibility !== 2)
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
                    @endif
                  @endforeach
                </select>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('tag')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
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

      {{-- Caracteristicas Section --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Caracteristicas</h4>
        {{-- Caracteristicas Form --}}
        <div class="container">
          <form action="{{ route('aProyect.addCar', $proyect->id) }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-8 col-lg-10">
                <select class="form-control @error('car') is-invalid @enderror" name="car">
                  <option selected disabled>Seleccionar Caracteristica</option>
                  @foreach (App\Models\Caracteristica::all() as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                  @endforeach
                </select>
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('car')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="col-md-4 col-lg-2">
                <button type="submit" class="btn bg-main-color btn-block navBar-btn text-light mt-3 mt-md-0 mb-3">Agregar</button>
              </div>
            </div>
            <div class="mb-3">
              @foreach ($proyect->caracteristicas as $cari)
                <div class="row align-items-center">
                  <div class="col-2 char-icon-con">
                    <div class="circle-cont-icon">
                      <i class="{{ $cari->icono }} circle-icon fa-2x text-light"></i>
                    </div>
                  </div>
                  <div class="col-2">
                    <h5>{{ $cari->name }}</h5>
                    <a
                      id="{{ $cari->id }}"
                      class="btn bg-main-color navBar-btn text-light charImgBtn"
                      data-toggle="modal" data-target="#charImgModal"
                      href="javascript:void(0);">
                      <i class="fas fa-camera"></i>
                    </a>
                    <a
                      class="btn btn-danger"
                      href="{{ route('aProyect.rmCar', [$proyect->id, $cari->id]) }}">
                      <i class="fas fa-times"></i>
                    </a>
                  </div>
                  <div class="col">
                    @forelse ($proyect->getMediaCara($cari->id) as $mc)
                      <img src="{{ Storage::url($mc->loc) }}" class="mediaProyect2 mb-2">
                      <a href="{{ route('caracs.rmMedia', $mc->id) }}" class="btn btn-sm btn-danger test"><i class="fas fa-times"></i></a>
                    @empty
                      <p>Sin imagenes.</p>
                    @endforelse
                  </div>
                </div>
                <hr>

              @endforeach
            </div>
          </form>
        </div>
      </div>

      {{-- Estacionamiento Section --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Estacionamiento</h4>
        {{-- Estacionamiento Form --}}
        <div class="container">
          <form action="{{ route('estacionamiento.addspot', $proyect->id) }}" method="POST">
            @csrf
            {{-- nombre--}}
            <div class="form-group row">
              {{-- nombre --}}
              <div class="col-8">
                <input
                  type="text"
                  name="floorName"
                  min="0"
                  class="form-control @error('floorName') is-invalid @enderror"
                  placeholder="Nombre" value="{{ old('floorName') }}"
                >
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('floorName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- Piso --}}
              <div class="col-2">
                <input
                  type="number"
                  name="parkingFlo"
                  min="1"
                  class="form-control @error('parkingFlo') is-invalid @enderror"
                  placeholder="Piso" value="{{ old('parkingFlo') }}"
                >
                <small id="emailHelp" class="form-text text-danger text-right">*Requerido.</small>
                @error('parkingFlo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-md-4 col-lg-2">
                <button type="submit" class="btn bg-main-color btn-block navBar-btn text-light mt-3 mt-md-0 mb-3">Agregar</button>
              </div>
            </div>
            @if (count($proyect->estacionamientos) !== 0)
              <div class="mb-3">
                <table class="table table-hover mt-4 table-responsive-sm">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Unidad</th>
                      <th scope="col">Piso</th>
                      <th scope="col">Status</th>
                      <th scope="col">Control</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($proyect->estacionamientos as $parking)
                      <tr>
                        {{-- id  --}}
                        <th scope="row">{{ $parking->id }}</th>
                        {{-- name  --}}
                        <td>
                          <a href="{{ route('estacionamiento.edit', $parking->id) }}">
                            {{ $parking->name }}
                          </a>
                        </td>
                        {{-- Unidad  --}}
                        @if ($parking->unidad)
                          <td>
                            <a href="{{ route('unidad.edit', $parking->unidad->id) }}">
                              {{ $parking->unidad->modelo }}
                            </a>
                          </td>
                        @else
                          <td>Sin Unidad</td>
                        @endif
                        {{-- piso  --}}
                        <td>{{ $parking->piso }}</td>
                        {{-- tags  --}}
                        <td>
                          @if ($parking->status === 0)
                            <span class="badge badge-danger">Ocupado</span>
                          @else
                            <span class="badge badge-success">Disponible</span>
                          @endif
                        </td>
                        {{-- Control  --}}
                        <td>
                          {{-- publicado --}}
                          @if ($parking->status === 1 )
                            <a
                              href="javascript:void(0);"
                              class="btn btn-sm btn-danger"
                              onclick="event.preventDefault(); document.getElementById('{{ 'parkingStatus'.$parking->id }}').submit();"
                              data-toggle="tooltip" data-placement="top" title="No disponible">
                              <i class="fas fa-ban"></i>
                            </a>
                            <form action=""></form>
                            <form id="parkingStatus{{ $parking->id }}"
                              action="{{ route('estacionamiento.ocupado', $parking->id) }}"
                              method="POST"
                              style="display: none;"
                              >@csrf
                            </form>
                          @else
                            <a
                              href="javascript:void(0);"
                              class="btn btn-sm btn-success"
                              onclick="event.preventDefault(); document.getElementById('parkingStatus{{ $parking->id }}').submit();"
                              data-toggle="tooltip" data-placement="top" title="Disponible">
                              <i class="fas fa-check"></i>
                            </a>
                            <form action=""></form>
                            <form id="{{ 'parkingStatus'.$parking->id}}"
                              action="{{ route('estacionamiento.disponible', $parking->id) }}"
                              method="POST"
                              style="display: none;"
                              >@csrf
                            </form>
                          @endif
      
                          {{-- delete --}}
                          <a
                            href="javascript:void(0);"
                            class="btn btn-sm btn-danger"
                            onclick="
                              event.preventDefault();
                              swal.fire({
                                text: '¿Deseas eliminar el estacionamiento?',
                                showCancelButton: true,
                                cancelButtonText: `Cancelar`,
                                cancelButtonColor:'#62A4C0',
                                confirmButtonColor:'red',
                                confirmButtonText:'Eliminar',
                                icon:'error',
                              }).then((result) => {
                                if (result.isConfirmed) {
                                  document.getElementById('{{ 'parkingDestroy'.$parking->id }}').submit();
                                }
                              });
                            "
                            data-toggle="tooltip" data-placement="top" title="Borrar Estacionamiento">
                            <i class="fas fa-trash"></i>
                          </a>
                          <form id="{{ 'parkingDestroy'.$parking->id }}"
                            action="{{ route('estacionamiento.destroy', $parking->id) }}"
                            method="POST"
                            style="display: none;"
                            >@method('DELETE') @csrf
                          </form>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <th class="main-color">No hay estacionamientos asociados al proyecto.</th>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            @endif
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
              <label for="banner">Banner (1920 × 927px, 2MB max, jpeg, png)</label><br>
              @if ($proyect->proyectHasMedia('banner'))
                <img src="{{ Storage::url($proyect->media->where('name', 'banner')->first()->loc) }}" class="mediaProyect mb-2">
                {{-- <h1>{{ $proyect->media->where('name', 'banner')->first()->loc }}</h1> --}}
              @endif
              <input type="hidden" name="proyect_id" value="{{ $proyect->id }}">
              <input type="hidden" name="name" value="banner">
              <input
                type="file"
                class="form-control-file @error('banner') is-invalid @enderror"
                name="banner"/>
              <small id="emailHelp" class="form-text text-danger">*Requerido.</small>
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
                <img src="{{ Storage::url($proyect->media->where('name', 'main')->first()->loc) }}" class="mediaProyect mb-2">
              @endif
              <input type="hidden" name="name" value="main">
              <input type="hidden" name="proyect_id" value="{{ $proyect->id }}">
              <input
                type="file"
                class="form-control-file @error('main') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="main"/>
              <small id="emailHelp" class="form-text text-danger">*Requerido.</small>
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
                  {{ str_replace('/media/', "",$media->loc) }}
                  <br>
                  <img src="{{ Storage::url($media->loc) }}" class="mediaProyect mb-2">
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
              <small id="emailHelp" class="form-text text-danger">*Requerido.</small>
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
              <input type="hidden" name="proyect_id" value="{{ $proyect->id }}">
              <input type="hidden" name="char_id" id="char_id" value="caca">
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
