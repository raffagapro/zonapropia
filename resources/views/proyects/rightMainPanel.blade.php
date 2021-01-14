<div class="col-md-8 rightpanel">
  <!-- Mini Filter Bar -->
  @include('proyects.miniFilterBar')
  <!-- Propety List -->
  <div class="row mainbody">
    @forelse ($proyectos as $proyecto)
      @if ($g)
        <x-proyects.gridItem />
      @else
        <x-proyects.listItem />
      @endif
    @empty
      <h1>Nada carnal!</h1>
    @endforelse
  </div>
  {{-- Paginator --}}
  {{$proyectos->links()}}
</div>
