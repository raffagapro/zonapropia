@extends('layouts.adminDashboard')
@section('title', 'Panel de Posts')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title mb-3">Post&nbsp</h2>
        <a href="{{ route('post.create')}}" class="td-none">
          <i class="fas fa-plus-circle fa-2x main-color"
            data-toggle="tooltip" data-placement="top" title="Agregar Post">
          </i>
          &nbsp
        </a>
        <span class="border-left">&nbsp Mostrando {{$posts->count()}} de {{$posts->total()}} resultados. &nbsp</span>
      </div>

      {{-- Filters --}}
      {{-- <form action="{{ route('aProyect.filter') }}" method="get">
        <div class="row"> --}}
          {{-- Buscar --}}
          {{-- <div class="col">
            <input type="text"
              class="form-control form-control-sm"
              name="search" placeholder="Buscar Nombrdel Proyecto"
              @isset($searched)
                value="{{ $searched }}"
              @endisset
            >
          </div> --}}
          {{-- Btns --}}
          {{-- <div class="col-2">
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
      </form> --}}

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Tags</th>
                <th scope="col">Fecha</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($posts as $post)
                <tr>
                  {{-- id  --}}
                  <th scope="row">{{ $post->id }}</th>
                  {{-- name  --}}
                  <td>
                    <a href="{{ route('post.edit', $post->id) }}">
                      {{ $post->title }}
                    </a>
                  </td>
                  {{-- tags  --}}
                  <td>
                    @foreach ($post->tags as $tag)
                      <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                  </td>
                  {{-- Date  --}}
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  {{-- Control  --}}
                  <td>
                    {{-- delete --}}
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="
                        event.preventDefault();
                        swal.fire({
                          text: '¿Deseas eliminar el post?',
                          showCancelButton: true,
                          cancelButtonText: `Cancelar`,
                          cancelButtonColor:'#62A4C0',
                          confirmButtonColor:'red',
                          confirmButtonText:'Eliminar',
                          icon:'error',
                        }).then((result) => {
                          if (result.isConfirmed) {
                            document.getElementById('{{ 'postDestroy'.$post->id }}').submit();
                          }
                        });
                      "
                      data-toggle="tooltip" data-placement="top" title="Borrar Post">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'postDestroy'.$post->id }}"
                      action="{{ route('post.destroy', $post->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron post en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$posts->links()}}
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
