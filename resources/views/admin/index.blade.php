@extends('layouts.adminDashboard')
@section('title', 'Admin Panel')

@section('content')
  <div style="background-color:#f5f5f5;">
    <div class="container pt-3 pb-3">
      {{-- Title --}}
      <h2 class="card-title mb-section-card-title pl-0 mb-3">Usuarios</h2>
      {{-- Filters --}}
      <form action="{{ route('adminPanel.filter') }}" method="get">
        <div class="row">
          <div class="col">
            <input type="text" class="form-control form-control-sm" name="search" placeholder="Buscar">
          </div>
          <div class="col">
            <select class="form-control form-control-sm" name="type">
              <option value="active"
                @isset($selector)
                  @if ($selector === 'active') selected @endif
                @endisset
                >Activos
              </option>
              <option value="deleted"
                @isset($selector)
                  @if ($selector === 'deleted') selected @endif
                @endisset
                >Desactivados
              </option>
            </select>
          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-sm bg-main-color btn-block navBar-btn text-light">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="col-2">
            <a href="{{ route('adminPanel.index')}}" class="btn btn-sm bg-main-color btn-block navBar-btn text-light">
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
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Control</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <th scope="row">{{ $user->id }}</th>
                  <td>
                    <a href="{{ route('adminPanel.edit', $user->id) }}">
                      {{ $user->name }}
                    </a>
                  </td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @foreach ($user->roles as $role)
                      <span class="badge badge-primary">{{ $role->name }}</span>
                    @endforeach
                  </td>
                  <td>
                    @if ($user->trashed())
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-success"
                        onclick="event.preventDefault(); document.getElementById('{{ 'userRestore'.$user->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Activar usuario">
                        <i class="fas fa-check"></i>
                      </a>
                      <form id="{{ 'userRestore'.$user->id }}"
                        action="{{ route('adminPanel.restore', $user->id) }}"
                        method="POST"
                        style="display: none;"
                        >@csrf
                      </form>
                    @else
                      <a
                        href="javascript:void(0);"
                        class="btn btn-sm btn-danger"
                        onclick="event.preventDefault(); document.getElementById('{{ 'userDestroy'.$user->id }}').submit();"
                        data-toggle="tooltip" data-placement="top" title="Desactivar usuario">
                        <i class="fas fa-times"></i>
                      </a>
                      <form id="{{ 'userDestroy'.$user->id }}"
                        action="{{ route('adminPanel.destroy', $user->id) }}"
                        method="POST"
                        style="display: none;"
                        >@method('DELETE') @csrf
                      </form>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

{{-- @section('scripts')

<script src="{{ asset('js/calendar.js') }}" defer></script>
@endsection --}}
