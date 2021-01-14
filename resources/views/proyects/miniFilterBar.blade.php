<div class="container">
  <div class="row minibar">
    <div class="col-3 col-md-3">
      @if (!$g)
        <a
          href="javascript:void(0);"
          class="btn btn-outline-primary main-color general-btn-outline minibar-filter-btn-hidden-sm"
          onclick="event.preventDefault(); document.getElementById('gridBtn').submit();"
          data-toggle="tooltip" data-placement="top" title="Cuadricula">
          <i class="fas fa-th"></i>
        </a>
        <form id="gridBtn"
          action="{{ route('proyects.index') }}"
          method="GET"
          style="display: none;"
          >@csrf
        </form>
      @else
        <a
          href="javascript:void(0);"
          class="btn btn-outline-primary main-color general-btn-outline minibar-filter-btn-hidden-sm"
          onclick="event.preventDefault(); document.getElementById('listBtn').submit();"
          data-toggle="tooltip" data-placement="top" title="Lista">
          <i class="fas fa-list"></i>
        </a>
        <form id="listBtn"
          action="{{ route('proyects.list') }}"
          method="POST"
          style="display: none;"
          >@csrf
        </form>
      @endif
    </div>
    <div class="col-9 col-md-4">
      <div class="form-group">
        <select class="form-control" id="exampleFormControlSelect1">
          <option value="" disabled selected>Precio mayor a menor</option>
          <option>1</option>
        </select>
      </div>
    </div>
    <div class="col-md-5 display-wrapper">
      <p class="page-display">Mostrando <span class="main-color">{{$proyectos->count()}} - {{$proyectos->total()}}</span> proyectos</p>
    </div>
  </div>
</div>
