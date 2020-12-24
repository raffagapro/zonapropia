<div class="slider-cont">
  <div class="container">
    <div class="row align-items-center pt-5">
      {{-- Left Panel --}}
      <div class="col-sm-6 col-lg-7 slider-lpanel">
        @php
          $subtitle='Zonapropia';
          $title='Propiedades';
          $par='Encuentra una propiedad a tu medida, del resto nos encargamos nosotros. Te ayudamos brindándote toda la información de manera sencilla y transparente para que tomes la mejor decisión.'
        @endphp
        <x-triTitle :subtitle="$subtitle" :title="$title" :par="$par"/>
      </div>

      {{-- Right Panel --}}
      <div class="col-sm-6 col-lg-5">
        <div class="card slider-rcardpanel">
          <div class="card-body">
            <form class="mainSearchPanel">
              <div class="form-group">
                <h3>Buscador</h3>
              </div>
              <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option value="" disabled selected>Tipo de compra</option>
                  <option>1</option>
                </select>
              </div>

              <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option value="" disabled selected>Comuna</option>
                  <option>2</option>
                </select>
              </div>

              <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option value="" disabled selected>Tipo de propiedad</option>
                  <option>2</option>

                </select>
              </div>

              <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option value="" disabled selected>Nueva</option>
                  <option>2</option>
                </select>
              </div>

              <div class="form-group">
                <label for="formControlRange">Precio: UF 0 - UF 1.200</label>
                <input type="range" class="form-control-range custom-range" id="formControlRange">
              </div>

              <button type="submit" class="btn btn-block bg-main-color general-btn">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
