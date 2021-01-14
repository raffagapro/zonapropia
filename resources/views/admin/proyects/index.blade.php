@extends('layouts.adminDashboard')
@section('title', 'Panel de Inmobiliarias')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">Proyectos&nbsp</h2>
        <a href="{{ route('aProyect.create')}}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Proyecto">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$proyects->count()}} de {{$proyects->total()}} resultados. &nbsp</span>
      </div>

      {{-- Filters --}}
      <form action="{{ route('aProyect.filter') }}" method="get">
        <div class="row">
          {{-- Buscar --}}
          <div class="col">
            <input type="text"
              class="form-control form-control-sm"
              name="search" placeholder="Buscar Nombrdel Proyecto"
              @isset($searched)
                value="{{ $searched }}"
              @endisset
            >
          </div>
          {{-- Btns --}}
          <div class="col-2">
            <button type="submit" class="btn btn-sm bg-main-color btn-block navBar-btn text-light">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="col-2">
            <a href="{{ route('aProyect.index')}}" class="btn btn-sm bg-main-color btn-block navBar-btn text-light">
              Remover Filtros
            </a>
          </div>
        </div>
      </form>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Inmobiliaria</th>
                <th scope="col">Tags</th>
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
                    @if ($proyect->inmobiliaria)
                      <a href="{{ route('inmo.edit', $proyect->inmobiliaria->id) }}">
                        {{ $proyect->inmobiliaria->name }}
                      </a>
                    @else
                      Sin Inmobiliaria
                    @endif
                  </td>
                  <td>
                    @foreach ($proyect->tags as $tag)
                      <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                  </td>
                  <td>
                    {{-- publicado --}}
                    @if ( (int)$proyect->estado_id === 1 )
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-warning"
                        onclick="event.preventDefault(); document.getElementById('{{ 'draftPro'.$proyect->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Borrador">
<<<<<<< HEAD
                        <i class="fas fa-cloud-download-alt"></i>
=======
                        <i class="fas fa-pencil-ruler"></i>
>>>>>>> 97b78cf3557f945ac9e3eed419e41630ad162ebc
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
<<<<<<< HEAD
                        <i class="fas fa-cloud-upload-alt"></i>
=======
                        <i class="fas fa-check-double"></i>
>>>>>>> 97b78cf3557f945ac9e3eed419e41630ad162ebc
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
                  <th class="main-color">No se encontraron proyectos en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$proyects->links()}}
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

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
