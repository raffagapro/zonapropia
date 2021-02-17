<div class="col-md-2 leftbar-cont">
  <!-- Main Form -->
  <form class="lb-form">
    <div class="form-group">
      <select class="form-control" name="tag">
        <option value="" disabled selected>Tipo de compra</option>
        @foreach (App\Models\Taggable::all() as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <select class="form-control" id="exampleFormControlSelect1">
        <option value="" disabled selected>Comuna</option>
        @foreach (App\Models\Comuna::all() as $comuna)
          <option value="{{ $comuna->id }}">{{ $comuna->provincia->name }}, {{ $comuna->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <select class="form-control" id="exampleFormControlSelect1">
        <option value="" disabled selected>Tipo de propiedad</option>
        @foreach (App\Models\Categoria::all() as $cat)
          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
      </select>
    </div>

    {{-- <div class="form-group">
      <select class="form-control" id="exampleFormControlSelect1">
        <option value="" disabled selected>Unidad</option>
        <option>1</option>
      </select>
    </div> --}}

    <button type="submit" class="btn bg-main-color general-btn">Buscar</button>
  </form>

  <!-- Unidades Filter Panel -->
  <div class="unidad-filter-cont">
    <!-- Rooms -->
    <div class="filter-cont">
      <h5 class="uf-cont-title">Dormitorios</h5>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">1 Dormitorio</p></div>
        <div class="col-6 text-right"><p class="m-0">(4)</p></div>
      </div>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">2 Dormitorios</p></div>
        <div class="col-6 text-right"><p class="m-0">(1)</p></div>
      </div>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">3 Dormitorios</p></div>
        <div class="col-6 text-right"><p class="m-0">(1)</p></div>
      </div>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">4 Dormitorios+</p></div>
        <div class="col-6 text-right"><p class="m-0">(4)</p></div>
      </div>
      <form class="mm-filter-cont">
        <div class="form-row">
          <div class="col">
            <input type="text" class="form-control mm-filter-input" placeholder="Mínimo">
          </div>
          &nbsp;-&nbsp;
          <div class="col">
            <input type="text" class="form-control mm-filter-input" placeholder="Máximo">
          </div>
          <div class="col">
            <input type="text" class="form-control mm-filter-input" disabled>
          </div>
        </div>
      </form>
    </div>

    <!-- Bathrooms -->
    <div class="filter-cont">
      <h5 class="uf-cont-title">Baños</h5>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">1 Baño</p></div>
        <div class="col-6 text-right"><p class="m-0">(4)</p></div>
      </div>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">2 Baños</p></div>
        <div class="col-6 text-right"><p class="m-0">(1)</p></div>
      </div>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">3 Baños</p></div>
        <div class="col-6 text-right"><p class="m-0">(1)</p></div>
      </div>
      <div class="row uf-room-item">
        <div class="col-6"><p class="m-0">4 Baños+</p></div>
        <div class="col-6 text-right"><p class="m-0">(4)</p></div>
      </div>
      <form class="mm-filter-cont">
        <div class="form-row">
          <div class="col">
            <input type="text" class="form-control mm-filter-input" placeholder="Mínimo">
          </div>
          &nbsp;-&nbsp;
          <div class="col">
            <input type="text" class="form-control mm-filter-input" placeholder="Máximo">
          </div>
          <div class="col">
            <input type="text" class="form-control mm-filter-input" disabled>
          </div>
        </div>
      </form>
    </div>

    <!-- Price Sliders -->
    <div class="filter-cont">
      <form class="mainSearchPanel">
        <div class="form-group">
          <label for="formControlRange">Precio: UF 0 - UF 1.200</label>
          <input type="range" class="form-control-range custom-range" id="formControlRange">
        </div>

        <div class="form-group">
          <label for="formControlRange">Superficie Total: 0 m<sup>2</sup> - 45m<sup>2</sup></label>
          <input type="range" class="form-control-range custom-range" id="formControlRange">
        </div>

        <div class="form-group">
          <label for="formControlRange">Superficie Útil: 0 m<sup>2</sup> - 45m<sup>2</sup></label>
          <input type="range" class="form-control-range custom-range" id="formControlRange">
        </div>
      </form>

    </div>

    <!-- Floors and Misc -->
    <div class="filter-cont">
      <h5 class="uf-cont-title">Piso</h5>
      <form class="mm-filter-cont mb-3">
        <div class="form-row">
          <div class="col">
            <select class="form-control" id="exampleFormControlSelect1">
              <option value="" disabled selected>Piso</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
            </select>
          </div>
        </div>
      </form>
      <div class="uf-room-item">
        <span class="badge badge-secondary filter-floor-badge">5
          <a href="#"><i class="fas fa-times text-light"></i></a>
        </span>
        <span class="badge badge-secondary filter-floor-badge">5
          <a href="#"><i class="fas fa-times text-light"></i></a>
        </span>
      </div>
      <form class="mm-filter-cont mb-3">
        <div class="form-row">
          <div class="col">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label uf-cont-title mb-0" for="defaultCheck1">
                Estacionamiento
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
              <label class="form-check-label uf-cont-title mb-0" for="defaultCheck2">
                Bodega
              </label>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
