<div class="col-md-9 rightpanel">
  <!-- Mini Filter Bar -->
  @include('proyects.miniFilterBar')
  <!-- Propety List -->
  <div class="row mainbody" id="gridCont">
    @forelse ($proyectos as $proyecto)
      <x-proyects.gridItem :proyect="$proyecto"/>
    @empty
      <h6>No se encontraron proyectos con los criterios establecido. <a href="{{ route('proyects.index')}}">Remover Criterios</a></h6>
    @endforelse
  </div>
  <div class="row mainbody" id="listCont" style="display: none">
    @forelse ($proyectos as $proyecto)
      <x-proyects.listItem :proyect="$proyecto"/>
    @empty
      <h6>No se encontraron proyectos con los criterios establecido. <a href="{{ route('proyects.index')}}">Remover Criterios</a></h6>
    @endforelse
  </div>
  {{-- Paginator --}}
  {{$proyectos->links()}}
</div>
