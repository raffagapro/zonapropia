@extends('layouts.adminDashboard')
@section('title', 'Modificar Inmobiliaria')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">{{ $inmo->name }}&nbsp</h2>
        <a href="{{ route('inmo.index') }}" class="border-left mt-3 td-none">&nbsp Regresar a Inmobiliarias.</a>
      </div>

      {{-- General info form --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
        {{-- General info --}}
        <div class="container">
          <form action="{{ route('inmo.update', $inmo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input
                type="text" name="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                placeholder="Nombre" value="{{ $inmo->name }}">
              @error('nombre')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group row">
              <div class="col-4">
                <input
                  type="file"
                  class="form-control-file @error('logo') is-invalid @enderror"
                  data-default-file="url_of_your_file"
                  name="logo"/>
                @error('logo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="col-3 mt4">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=1 name="destacar"
                  @if ((int)$inmo->destacar === 1) checked @endif
                >
                <label class="form-check-label" for="defaultCheck1">
                  Destacar en barra de logos.
                </label>
              </div>
              <div class="col">
                <img src="{{ asset($inmo->logo) }}" alt="">
              </div>
            </div>
            <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar</button>
          </form>
        </div>
      </div>

      {{-- Proyectos table --}}
      <div class="card mb-section-card">
        {{-- Title --}}
        <h4 class="card-title mb-section-card-title mt-1">
          Proyectos
          <a href="{{ route('aProyect.create')}}" class="td-none">
            <i class="fas fa-plus-circle main-color"
              data-toggle="tooltip" data-placement="top" title="Nuevo Proyecto">
            </i>
          </a>
<<<<<<< HEAD
=======
          {{-- <a href="{{ route('aProyect.index')}}" class="td-none">
            <i class="fas fa-search-plus main-color"
              data-toggle="tooltip" data-placement="top" title="Buscar Proyecto">
            </i>
          </a> --}}
>>>>>>> 97b78cf3557f945ac9e3eed419e41630ad162ebc
        </h4>
        <div class="container">
          {{-- Table --}}
          <table class="table table-hover mt-4 table-responsive-sm">
<<<<<<< HEAD
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($proyects as $proyect)
                <tr>
                  <th scope="row">{{ $proyect->id }}</th>
                  <td>
                    <a href="{{ route('aProyect.edit', $proyect->id) }}">
                      {{ $proyect->name }}
                    </a>
                  </td>
                  <td>
                    {{-- publicado --}}
                    @if ( (int)$proyect->estado_id === 1 )
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-warning"
                        onclick="event.preventDefault(); document.getElementById('{{ 'draftPro'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Borrador">
                        <i class="fas fa-pencil-ruler"></i>
                      </a>
                      <form id="{{ 'draftPro'.$proyect->id }}"
                        action="{{ route('aProyect.draft', $proyect->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @else
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-success"
                        onclick="event.preventDefault(); document.getElementById('{{ 'publishPro'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Publicar">
                        <i class="fas fa-check-double"></i>
                      </a>
                      <form id="{{ 'publishPro'.$proyect->id }}"
                        action="{{ route('aProyect.publish', $proyect->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @endif

                    {{-- destacar --}}
                    @if ( (int)$proyect->destacado === 1 )
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-primary"
                        onclick="event.preventDefault(); document.getElementById('{{ 'deHighlightPro'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Remover Destacar">
                        <i class="fas fa-eye-slash"></i>
                      </a>
                      <form id="{{ 'deHighlightPro'.$proyect->id }}"
                        action="{{ route('aProyect.deHighlight', $proyect->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @else
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-primary"
                        onclick="event.preventDefault(); document.getElementById('{{ 'highlightPro'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Destacar Proyecto">
                        <i class="fas fa-star"></i>
                      </a>
                      <form id="{{ 'highlightPro'.$proyect->id }}"
                        action="{{ route('aProyect.highlight', $proyect->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @endif

                    {{-- delete --}}
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'proyectRM'.$proyect->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Remover Proyecto">
                      <i class="fas fa-times"></i>
                    </a>
                    <form id="{{ 'proyectRM'.$proyect->id }}"
                      action="{{ route('inmo.rmProyect', [$proyect->id, $inmo->id]) }}"
=======
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Control</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($proyects as $proyect)
              <tr>
                <th scope="row">{{ $proyect->id }}</th>
                <td>
                  <a href="{{ route('inmo.edit', $proyect->id) }}">
                    {{ $proyect->name }}
                  </a>
                </td>
                <td>
                  {{-- publicado --}}
                  @if ( (int)$proyect->estado_id === 1 )
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-warning"
                      onclick="event.preventDefault(); document.getElementById('{{ 'draftPro'.$proyect->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Borrador">
                      <i class="fas fa-pencil-ruler"></i>
                    </a>
                    <form id="{{ 'draftPro'.$proyect->id }}"
                      action="{{ route('aProyect.draft', $proyect->id) }}"
                      method="POST"
                      style="display: none;"
                      >@csrf
                    </form>
                  @else
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-success"
                      onclick="event.preventDefault(); document.getElementById('{{ 'publishPro'.$proyect->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Publicar">
                      <i class="fas fa-check-double"></i>
                    </a>
                    <form id="{{ 'publishPro'.$proyect->id }}"
                      action="{{ route('aProyect.publish', $proyect->id) }}"
                      method="POST"
                      style="display: none;"
                      >@csrf
                    </form>
                  @endif

                  {{-- destacar --}}
                  @if ( (int)$proyect->destacado === 1 )
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-primary"
                      onclick="event.preventDefault(); document.getElementById('{{ 'deHighlightPro'.$proyect->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Remover Destacar">
                      <i class="fas fa-eye-slash"></i>
                    </a>
                    <form id="{{ 'deHighlightPro'.$proyect->id }}"
                      action="{{ route('aProyect.deHighlight', $proyect->id) }}"
                      method="POST"
                      style="display: none;"
                      >@csrf
                    </form>
                  @else
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-primary"
                      onclick="event.preventDefault(); document.getElementById('{{ 'highlightPro'.$proyect->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Destacar Proyecto">
                      <i class="fas fa-star"></i>
                    </a>
                    <form id="{{ 'highlightPro'.$proyect->id }}"
                      action="{{ route('aProyect.highlight', $proyect->id) }}"
>>>>>>> 97b78cf3557f945ac9e3eed419e41630ad162ebc
                      method="POST"
                      style="display: none;"
                      >@csrf
                    </form>
<<<<<<< HEAD
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron proyectos asociados a esta inmobiliaria.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
=======
                  @endif

                  {{-- delete --}}
                  <a
                    href="javascript:void(0);"
                    class="btn btn-sm btn-danger"
                    onclick="event.preventDefault(); document.getElementById('{{ 'proyectDestroy'.$proyect->id }}').submit();"
                    data-toggle="tooltip" data-placement="top" title="Borrar Proyecto">
                    <i class="fas fa-trash"></i>
                  </a>
                  <form id="{{ 'proyectDestroy'.$proyect->id }}"
                    action="{{ route('aProyect.destroy', $proyect->id) }}"
                    method="POST"
                    style="display: none;"
                    >@method('DELETE') @csrf
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <th class="main-color">No se encontraron proyectos asociados a esta inmobiliaria.</th>
              </tr>
            @endforelse
          </tbody>
        </table>
>>>>>>> 97b78cf3557f945ac9e3eed419e41630ad162ebc
          {{-- Paginator --}}
          {{$proyects->links()}}
          {{-- Agregar Proyecto Existente --}}
          <h5 class="card-title mb-section-card-title mt-1 mb-4 pl-0">Agregar Proyecto Existente</h5>
          <form action="{{ route('inmo.search') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-8">
                <input type="text" class="form-control" name="search" placeholder="Nombre del proyecto">
                <input type="hidden" name="inmo_id" value="{{ $inmo->id }}">
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-block bg-main-color navBar-btn text-light float-right mb-3">Buscar</button>
              </div>
            </div>
          </form>
          {{-- Proyect Found Table --}}
          @isset($searched)
            <table class="table table-hover mt-4 table-responsive-sm">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Control</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($searched as $s)
                  <tr>
                    <th scope="row">{{ $s->id }}</th>
                    <td>
                      {{ $s->name }}
                    </td>
                    <td>
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-primary bg-main-color"
<<<<<<< HEAD
                        onclick="event.preventDefault(); document.getElementById('{{ 'proyectAggr'.$s->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Agregar Proyecto">
                        <i class="fas fa-plus"></i>
                      </a>
                      <form id="{{ 'proyectAggr'.$s->id }}"
=======
                        onclick="event.preventDefault(); document.getElementById('{{ 'proyectAdd'.$s->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Agregar Proyecto">
                        <i class="fas fa-plus"></i>
                      </a>
                      <form id="{{ 'proyectAdd'.$s->id }}"
>>>>>>> 97b78cf3557f945ac9e3eed419e41630ad162ebc
                        action="{{ route('inmo.addProyect') }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                        <input type="hidden" name="inmo_id" value="{{ $inmo->id }}">
                        <input type="hidden" name="proyect_id" value="{{ $s->id }}">
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <th class="main-color">No se encontraron proyectos en el registro.</th>
                  </tr>
                @endforelse
              </tbody>
            </table>
          @endisset
        </div>
      </div>
    </div>
  </div>
  @if(session('status'))
    <x-sweet-alert-admin :message="session('status')"/>
  @endif
@endsection
