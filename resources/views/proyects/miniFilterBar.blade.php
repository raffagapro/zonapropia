<div class="container">
  <div class="row minibar">
    <div class="col-3 col-md-3">
      {{-- grid btn  --}}
      <a
        id="listBtn"
        href="javascript:void(0);"
        class="btn yg-btn general-btn-outline2 minibar-filter-btn-hidden-sm"
        data-toggle="tooltip" data-placement="top" title="Cuadricula">
        <i class="fas fa-th"></i>
      </a>
      {{-- list btn  --}}
      <a
        id="gridBtn"
        href="javascript:void(0);"
        class="btn yg-btn general-btn-outline2 minibar-filter-btn-hidden-sm"
        data-toggle="tooltip" data-placement="top" title="Lista">
        <i class="fas fa-list"></i>
      </a>
    </div>
    <div class="col-9 col-md-4">
      <div class="form-group">
        <select class="form-control" id="sortingSelect">
          <option value=0>Precio mayor a menor</option>
          <option value=1>Precio menor a mayor</option>
        </select>
      </div>
    </div>
    <div class="col-md-5 display-wrapper">
      <p class="page-display">Mostrando <span class="second-color ">{{$proyectos->count()}} - {{$proyectos->total()}}</span> proyectos</p>
    </div>
  </div>
</div>
