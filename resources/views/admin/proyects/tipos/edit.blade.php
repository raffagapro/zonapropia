@extends('layouts.adminDashboard')
@section('title', 'Editar Tipologia')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Editar Tipologia: {{$tipo->modelo}}&nbsp</h2>
        <a
          href="javascript:void(0);"
          class="border-left mt-3 td-none"
          onclick="event.preventDefault(); document.getElementById('{{ 'tipoPro'.$tipo->proyecto->id }}').submit();"
          >
          &nbsp Regresar a Tipologias - {{$tipo->proyecto->name}}.
        </a>
        <form id="{{ 'tipoPro'.$tipo->proyecto->id }}"
          action="{{ route('tipo.index', $tipo->proyecto->id) }}"
          method="Post"
          style="display: none;"
          >@csrf
        </form>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('tipo.update', $tipo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="proyect_id" value="{{ $tipo->proyecto->id }}">
            {{-- modelo / Nombre --}}
            <div class="form-group row">
              {{-- modelo --}}
              <div class="col-6">
                <label for="cuotaMonto">Modelo</label>
                <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ $tipo->modelo }}">
                @error('modelo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- code --}}
              <div class="col-6">
                <label for="nombre">Codigo</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ $tipo->code }}">
                @error('code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- status/vulnerable/uf_m2 --}}
            <div class="form-group row">
              {{-- Status --}}
              <div class="col-4">
                <label for="status">Status</label>
                <select class="form-control" name="status">
                  <option value=0 @if ((int)$tipo->status === 0) selected @endif>Bloqueada</option>
                  <option value=1 @if ((int)$tipo->status === 1) selected @endif>Disponible</option>
                </select>
              </div>
              {{-- Vulnerable --}}
              <div class="col-4">
                <label for="vulnerable">Vulnerable</label>
                <select class="form-control" name="vulnerable">
                  <option value=0 @if ((int)$tipo->vulnerable === 0) selected @endif>No</option>
                  <option value=1 @if ((int)$tipo->vulnerable === 1) selected @endif>Si</option>
                </select>
              </div>
              {{-- uf_m2 --}}
              <div class="col-4">
                <label for="uf_m2">UF Mt2</label>
                <input type="text" name="uf_m2" class="form-control @error('uf_m2') is-invalid @enderror" value="{{ $tipo->uf_m2 }}">
                @error('uf_m2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- lote/piso/orientacion --}}
            <div class="form-group row">
              {{-- lote --}}
              <div class="col-4">
                <label for="lote">Lote</label>
                <input type="text" name="lote" class="form-control @error('lote') is-invalid @enderror" value="{{ $tipo->lote }}">
                @error('lote')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- piso --}}
              <div class="col-4">
                <label for="piso">Piso</label>
                <input type="text" name="piso" class="form-control @error('piso') is-invalid @enderror" value="{{ $tipo->piso }}">
                @error('piso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- orientacion --}}
              <div class="col-4">
                <label for="orientacion">Orientación</label>
                <select class="form-control" name="orientacion" value="{{ old('orientacion') }}">
                  <option value=0 @if ((int)$tipo->orientacion === 0) selected @endif>Sin orientación</option>
                  <option value=1 @if ((int)$tipo->orientacion === 1) selected @endif>Sur Poniente</option>
                  <option value=2 @if ((int)$tipo->orientacion === 2) selected @endif>Nor Oriente</option>
                </select>
                @error('orientacion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- dorm/banos/superficie_municipal --}}
            <div class="form-group row">
              {{-- dorm --}}
              <div class="col-4">
                <label for="dormitorios">Dormitorios</label>
                <input type="text" name="dormitorios" class="form-control @error('dormitorios') is-invalid @enderror" value="{{ $tipo->dormitorios }}">
                @error('dormitorios')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- banos --}}
              <div class="col-4">
                <label for="banos">Baños</label>
                <input type="text" name="banos" class="form-control @error('banos') is-invalid @enderror" value="{{ $tipo->banos }}">
                @error('banos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- superficie_municipal --}}
              <div class="col-4">
                <label for="superficie_municipal">Superficie Municipal</label>
                <input type="text" name="superficie_municipal" class="form-control @error('superficie_municipal') is-invalid @enderror" value="{{ $tipo->superficie_municipal }}">
                @error('superficie_municipal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- superficie_total/superficie_inferior/superficie_terrazas --}}
            <div class="form-group row">
              {{-- superficie_total --}}
              <div class="col-4">
                <label for="superficie_total">Superficie Total</label>
                <input type="text" name="superficie_total" class="form-control @error('superficie_total') is-invalid @enderror" value="{{ $tipo->superficie_total }}">
                @error('superficie_total')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- superficie_inferior --}}
              <div class="col-4">
                <label for="superficie_inferior">Superficie Inferior</label>
                <input type="text" name="superficie_inferior" class="form-control @error('superficie_inferior') is-invalid @enderror" value="{{ $tipo->superficie_inferior }}">
                @error('superficie_inferior')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- superficie_terrazas --}}
              <div class="col-4">
                <label for="superficie_terrazas">Superficie Terrazas</label>
                <input type="text" name="superficie_terrazas" class="form-control @error('superficie_terrazas') is-invalid @enderror" value="{{ $tipo->superficie_terrazas }}">
                @error('superficie_terrazas')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- superficie_loggia/precio_lista/precio_venta --}}
            <div class="form-group row">
              {{-- superficie_loggia --}}
              <div class="col-4">
                <label for="superficie_loggia">Superficie Loggia</label>
                <input type="text" name="superficie_loggia" class="form-control @error('superficie_loggia') is-invalid @enderror" value="{{ $tipo->superficie_loggia }}">
                @error('superficie_loggia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- precio_lista --}}
              <div class="col-4">
                <label for="precio_lista">Precio Lista</label>
                <input type="text" name="precio_lista" class="form-control @error('precio_lista') is-invalid @enderror" value="{{ $tipo->precio_lista }}">
                @error('precio_lista')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- precio_venta --}}
              <div class="col-4">
                <label for="precio_venta">Precio Venta</label>
                <input type="text" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{ $tipo->precio_venta }}">
                @error('precio_venta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            {{-- Tipologia --}}
            <div class="form-group">
              <label for="tipologia">Imagen (552x552px, 1MB max)</label><br>
              @if ($tipo->tipologia !== null)
                <img src="{{ asset($tipo->tipologia) }}" alt="">
              @else
                <h1>Sin imagen en registro.</h1>
              @endif
              <input
                type="file"
                class="form-control-file @error('tipologia') is-invalid @enderror"
                data-default-file="url_of_your_file"
                name="tipologia"/>
              @error('tipologia')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Tipologia</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
@endsection

{{-- @section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/regionSwitcherCreate.js') }}" ></script>
@endsection --}}
