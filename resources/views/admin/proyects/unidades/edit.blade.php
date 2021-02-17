@extends('layouts.adminDashboard')
@section('title', 'Editar Unidad')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Editar Unidad: {{$unidad->modelo}}&nbsp</h2>
        <a
          href="javascript:void(0);"
          class="border-left mt-3 td-none"
          onclick="event.preventDefault(); document.getElementById('{{ 'unidadesPro'.$unidad->proyecto->id }}').submit();"
          >
          &nbsp Regresar a Unidades - {{$unidad->proyecto->name}}.
        </a>
        <form id="{{ 'unidadesPro'.$unidad->proyecto->id }}"
          action="{{ route('unidad.zIndex', $unidad->proyecto->id) }}"
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
          <form action="{{ route('unidad.update', $unidad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="proyect_id" value="{{ $unidad->proyecto->id }}">
            {{-- modelo / Nombre --}}
            <div class="form-group row">
              {{-- modelo --}}
              <div class="col-6">
                <label for="cuotaMonto">Modelo</label>
                <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ $unidad->modelo }}">
                @error('modelo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- code --}}
              <div class="col-6">
                <label for="nombre">Codigo</label>
                <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ $unidad->code }}">
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
                  <option value=0 @if ((int)$unidad->status === 0) selected @endif>Bloqueada</option>
                  <option value=1 @if ((int)$unidad->status === 1) selected @endif>Disponible</option>
                </select>
              </div>
              {{-- Vulnerable --}}
              <div class="col-4">
                <label for="vulnerable">Vulnerable</label>
                <select class="form-control" name="vulnerable">
                  <option value=0 @if ((int)$unidad->vulnerable === 0) selected @endif>No</option>
                  <option value=1 @if ((int)$unidad->vulnerable === 1) selected @endif>Si</option>
                </select>
              </div>
              {{-- uf_m2 --}}
              <div class="col-4">
                <label for="uf_m2">UF Mt2</label>
                <input type="text" name="uf_m2" class="form-control @error('uf_m2') is-invalid @enderror" value="{{ $unidad->uf_m2 }}">
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
                <input type="text" name="lote" class="form-control @error('lote') is-invalid @enderror" value="{{ $unidad->lote }}">
                @error('lote')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- piso --}}
              <div class="col-4">
                <label for="piso">Piso</label>
                <input type="text" name="piso" class="form-control @error('piso') is-invalid @enderror" value="{{ $unidad->piso }}">
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
                  <option value=0 @if ((int)$unidad->orientacion === 0) selected @endif>Sin orientación</option>
                  <option value=1 @if ((int)$unidad->orientacion === 1) selected @endif>Sur Poniente</option>
                  <option value=2 @if ((int)$unidad->orientacion === 2) selected @endif>Nor Oriente</option>
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
                <input type="text" name="dormitorios" class="form-control @error('dormitorios') is-invalid @enderror" value="{{ $unidad->dormitorios }}">
                @error('dormitorios')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- banos --}}
              <div class="col-4">
                <label for="banos">Baños</label>
                <input type="text" name="banos" class="form-control @error('banos') is-invalid @enderror" value="{{ $unidad->banos }}">
                @error('banos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- superficie_municipal --}}
              <div class="col-4">
                <label for="superficie_municipal">Superficie Municipal</label>
                <input type="text" name="superficie_municipal" class="form-control @error('superficie_municipal') is-invalid @enderror" value="{{ $unidad->superficie_municipal }}">
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
                <input type="text" name="superficie_total" class="form-control @error('superficie_total') is-invalid @enderror" value="{{ $unidad->superficie_total }}">
                @error('superficie_total')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- superficie_inferior --}}
              <div class="col-4">
                <label for="superficie_inferior">Superficie Inferior</label>
                <input type="text" name="superficie_inferior" class="form-control @error('superficie_inferior') is-invalid @enderror" value="{{ $unidad->superficie_inferior }}">
                @error('superficie_inferior')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- superficie_terrazas --}}
              <div class="col-4">
                <label for="superficie_terrazas">Superficie Terrazas</label>
                <input type="text" name="superficie_terrazas" class="form-control @error('superficie_terrazas') is-invalid @enderror" value="{{ $unidad->superficie_terrazas }}">
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
                <input type="text" name="superficie_loggia" class="form-control @error('superficie_loggia') is-invalid @enderror" value="{{ $unidad->superficie_loggia }}">
                @error('superficie_loggia')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- precio_lista --}}
              <div class="col-4">
                <label for="precio_lista">Precio Lista</label>
                <input type="text" name="precio_lista" class="form-control @error('precio_lista') is-invalid @enderror" value="{{ $unidad->precio_lista }}">
                @error('precio_lista')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              {{-- precio_venta --}}
              <div class="col-4">
                <label for="precio_venta">Precio Venta</label>
                <input type="text" name="precio_venta" class="form-control @error('precio_venta') is-invalid @enderror" value="{{ $unidad->precio_venta }}">
                @error('precio_venta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Unidad</button>
          </form>
        </div>
      </div>

      {{-- Tipologias table --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1">
          Tipologias
          <a href="{{ route('tipo.create', $unidad->id)}}" class="td-none">
            <i class="fas fa-plus-circle main-color"
              data-toggle="tooltip" data-placement="top" title="Agregar Tipologia">
            </i>
          </a>
        </h4>
        <div class="container">
          {{-- Table --}}
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Media</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($unidad->tipologias as $tipo)
                <tr>
                  <th scope="row">{{ $tipo->id }}</th>
                  {{-- titulo --}}
                  <td>
                    <a href="{{ route('tipo.edit', $tipo->id) }}">
                      {{ $tipo->titulo }}
                    </a>
                  </td>
                  {{-- Media --}}
                  <td>
                    <img src="{{ asset($tipo->media) }}" class="tipoImg">
                  </td>
                  {{-- Control --}}
                  <td>
                    {{-- delete --}}
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'delTipo'.$tipo->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Remover Tipologia">
                      <i class="fas fa-times"></i>
                    </a>
                    <form id="{{ 'delTipo'.$tipo->id }}"
                      action="{{ route('tipo.destroy', $tipo->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron tipologias asociadas a esta unidad.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
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

{{-- @section('scripts')
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/ajax/regionSwitcherCreate.js') }}" ></script>
@endsection --}}
