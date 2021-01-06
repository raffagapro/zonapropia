@extends('layouts.adminDashboard')
@section('title', 'Panel de Categorias')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">

      {{-- Title --}}
      <div class="row align-items-center">
        <h2 class="card-title mb-section-card-title">Categories&nbsp</h2>
        <span class="border-left mt-3">&nbsp&nbspMostrando {{$categories->count()}} de {{$categories->total()}} resultados.</span>
      </div>

      {{-- Table --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          <table class="table table-hover mt-4 table-responsive-sm">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($categories as $categorie)
                <tr>
                  <th scope="row">{{ $categorie->id }}</th>
                  <td>
                    <a href="{{ route('category.edit', $categorie->id) }}">
                      {{ $categorie->name }}
                    </a>
                  </td>
                  <td>
                    <a
                      href="javascript:void(0);"
                      class="btn btn-sm btn-danger"
                      onclick="event.preventDefault(); document.getElementById('{{ 'catDestroy'.$categorie->id }}').submit();"
                      data-toggle="tooltip" data-placement="top" title="Borrar Anuncio">
                      <i class="fas fa-trash"></i>
                    </a>
                    <form id="{{ 'catDestroy'.$categorie->id }}"
                      action="{{ route('category.destroy', $categorie->id) }}"
                      method="POST"
                      style="display: none;"
                      >@method('DELETE') @csrf
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <th class="main-color">No se encontraron categorias en el registro.</th>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{-- Paginator --}}
          {{$categories->links()}}
        </div>
      </div>

      {{-- Add Notice --}}
      <div class="card mb-section-card">
        <div class="card-body pt-0">
          {{-- Title --}}
          <h4 class="card-title mb-section-card-title mt-1 mb-4">Agregar Categoria</h4>
          {{-- Form --}}
          <div class="container">
            <form action="{{ route('category.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
              </div>
              <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Guardar</button>
            </form>
          </div>
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
