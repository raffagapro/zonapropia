<div class="col-md-10 rightpanel">
  <!-- Mini Filter Bar -->
  @include('proyects.miniFilterBar')
  <!-- Propety List -->
  <div class="row mainbody">
    @forelse ($proyectos as $proyecto)
      @if ($g)
        <x-proyects.gridItem :proyect="$proyecto"/>
      @else
        <x-proyects.listItem :proyect="$proyecto"/>
      @endif
    @empty
      <h1>No proyects</h1>
    @endforelse
  </div>
  {{-- Paginator --}}
  {{$proyectos->links()}}
</div>
