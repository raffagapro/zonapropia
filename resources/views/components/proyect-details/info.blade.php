@props([
  'proyect' => $proyect,
])

<div class="row">
  <!-- Left Panel -->
  <div class="col-lg-8">
    <!-- Proyect Info -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-5 mb-5">
        <!-- Title -->
        <div class="col-md-6">
          <h2 class="mb-info-title">Información del proyecto</h2>
          <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:red;"></i> {{ $proyect->comuna->name }} - {{ $proyect->name }}</small>
        </div>
        <!-- Rating -->
        <div class="col-md-6 mb-pf-rating-align mt-4">
          @if ($proyect->getUF())
            <h1 class="mb-info-rating-title mb-0 pb-0"><span class="mb-info-rating-pretitle">Desde </span>{{ $proyect->getUF() }}</h1>
          @else
            <h1 class="mb-info-rating-title mb-0 pb-0"><span class="mb-info-rating-pretitle">Próximamente</h1>
          @endif
          {{-- <h1 class="mb-info-rating-cont mt-0 pt-0">
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating-empty"></i>
          </h1> --}}
        </div>
        <!-- Paragrap -->
        <div class="col-12 mt-5">
          <p>{{ $proyect->descripcion }}</p>
        </div>
        <!-- Características -->
        <div class="col-12 mt-4">
          <h4>Características</h4>
        </div>
        @if ((int)$proyect->maxRooms !== 0)
          <div class="col-md-4 mb-char-aleft mt-4">
            <h5><i class="fas fa-bed"></i> {{ $proyect->minRooms }} - {{ $proyect->maxRooms }} dormitorios</h5>
          </div>
        @endif
        @if ((int)$proyect->maxBathrooms !== 0)
          <div class="col-md-4 mb-char-acenter mt-4">
            <h5><i class="fas fa-toilet"></i> {{ $proyect->minBathrooms }} - {{ $proyect->maxBathrooms }} baños</h5>
          </div>
        @endif
        <div class="col-md-4 mb-char-aright mt-4">
          <h5><i class="fas fa-expand-arrows-alt"></i> {{ $proyect->minMC }} - {{ $proyect->maxMC }} m<sup>2</sup></h5>
        </div>
        <!-- Gallery -->
        @if (count($proyect->media->where('name', 'media')->all()) > 0 )
          <div class="col-12 mt-4">
            <h3 class="mb-datos-title">Galería</h3>
          </div>
          <div class="col-12 mt-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                @php
                  $go = 0;
                @endphp
                @forelse ($proyect->media->where('name', 'media')->all() as $media)
                  <div class="carousel-item @if ($go === 0) active @php $go = 1; @endphp @endif">
                    <img src="{{ $media->loc }}" class="d-block w-100" alt="...">
                  </div>
                @empty
                  <h3>Sin imagenes</h3>
                @endforelse
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        @endif
      </div>
    </div>
    <!-- Cotizaador -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-5 mb-5">
        <!-- Title -->
        <div class="col-6">
          <h3 class="mb-info-title">Cotizador</h3>
        </div>
        <div class="col-6 text-right">
          <h4 class="mb-info-title">Tipología A2</h4>
        </div>
        <!-- Map Carrousel -->
        <div class="col-12 mt-4">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./assets/images/map-sample.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-12 mt-4">
          <form>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Piso</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Orientación</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Unidad</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Estacionamiento</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Bodega</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </div>
              <div class="col-md-6"></div>
              <div class="col">
                <button type="submit" class="btn btn-block bg-main-color general-btn">Continuar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Ubicacion -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-5 mb-5">
        <!-- Title -->
        <div class="col-12">
          <h3 class="mb-info-title">Ubicación</h3>
        </div>
        <!-- Map -->
        <div class="col-12 mt-4">
          {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12435.807215717095!2d".$proyect->latitud."!3d".$proyect->longitud."!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5676a883be8cdf%3A0x6feaafc65eb0a49c!2sCostco%20M%C3%A9rida!5e0!3m2!1ses-419!2smx!4v1607535700350!5m2!1ses-419!2smx" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
          @php
            $mUrl = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14892.511597308125!2d";
            $mUrl .= $proyect->longitud."8512115!3d".$proyect->latitud;
            $mUrl .= "2453485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5675a3bdefd325%3A0x574e993843a6c287!2sFraccionamiento%20Las%20Am%C3%A9ricas%2C%20M%C3%A9rida%2C%20Yuc.!5e0!3m2!1ses-419!2smx!4v1610672924000!5m2!1ses-419!2smx";

          @endphp
          <iframe src="{{ $mUrl }}" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
      </div>
    </div>
  </div>

  <!-- Right Panel -->
  <div class="col-lg-4">
    <!-- Logo -->
    @if ($proyect->inmobiliaria !== null)
      <div class="card mb-section-card mt-0">
        <div class="card-body row align-items-center mt-5 mb-5">
          <img src="{{ asset($proyect->inmobiliaria->logo) }}" alt="" class="mb-main-logo">
        </div>
      </div>
    @endif
    <!-- Etapa de venta -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row align-items-center mt-2 mb-5">
        <!-- Etapa de venta -->
        <div class="col-12 mt-4">
          <h5 class="mb-0">Etapa de Venta</h5>
          @if ((int)$proyect->etapa_venta === 1) <small>1er etapa </small>@endif
          @if ((int)$proyect->etapa_venta === 2) <small>2da etapa </small>@endif
          @if ((int)$proyect->etapa_venta === 3) <small>3er etapa </small>@endif
          <div class="row">
            <div class="col-4 pr-1"><hr class="mb-hr-indicator-green"></div>
            @if ((int)$proyect->etapa_venta > 1)
              <div class="col-4 pr-1 pl-1"><hr class="mb-hr-indicator-green"></div>
            @else
              <div class="col-4 pr-1 pl-1"><hr class="mb-hr-indicator"></div>
            @endif
            @if ((int)$proyect->etapa_venta > 2)
              <div class="col-4 pl-1"><hr class="mb-hr-indicator-green"></div>
            @else
              <div class="col-4 pl-1"><hr class="mb-hr-indicator"></div>
            @endif
          </div>
        </div>
        <!-- Fecha de entrega -->
        <div class="col-12 mt-4">
          <h5 class="">Fecha de Entrega</h5>
          <h6><i class="far fa-calendar-alt" style="color:#D0D0D0"></i> {{ $proyect->fecha_entrega }}</h6>
        </div>
        <!-- Seguridad del sector -->
        <div class="col-12 mt-4">
          <h5 class="mb-0">Seguridad del sector</h5>
          @if ((int)$proyect->seguridad === 1) <small>Baja </small>@endif
          @if ((int)$proyect->seguridad === 2) <small>Media </small>@endif
          @if ((int)$proyect->seguridad === 3) <small>Alta </small>@endif
          <div class="row">
            <div class="col-4 pr-1"><hr class="mb-hr-indicator-red"></div>
            @if ((int)$proyect->seguridad > 1)
              <div class="col-4 pr-1 pl-1"><hr class="mb-hr-indicator-red"></div>
            @else
              <div class="col-4 pr-1 pl-1"><hr class="mb-hr-indicator"></div>
            @endif
            @if ((int)$proyect->seguridad > 2)
              <div class="col-4 pl-1"><hr class="mb-hr-indicator-red"></div>
            @else
              <div class="col-4 pl-1"><hr class="mb-hr-indicator"></div>
            @endif
          </div>
        </div>
        <!-- Fecha de publicación -->
        <div class="col-12 mt-4">
          <h5 class="">Fecha de publicación</h5>
          <h6><i class="far fa-calendar-alt" style="color:#D0D0D0"></i> {{ $proyect->created_at->diffForHumans() }}</h6>
        </div>
        <!-- Financiamiento -->
        <div class="col-12 mt-4">
          <h5 class="">Financiamiento</h5>
          <button type="submit" class="btn btn-block bg-main-color general-btn mt-4">Aprobación</button>
        </div>
      </div>
    </div>
    <!-- Contacto -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-2 mb-5">
        <div class="col-12 mt-4">
          <h5>Contacto</h5>
          <form class="mt-4">
            <div class="form-group">
              <input type="text" class="form-control mb-contact-from-input" id="exampleFormControlInput1" placeholder="Nombre">
            </div>
            <div class="form-group">
              <input type="text" class="form-control mb-contact-from-input" id="exampleFormControlInput1" placeholder="Apellido">
            </div>
            <div class="form-group">
              <input type="email" class="form-control mb-contact-from-input" id="exampleFormControlInput1" placeholder="Mail">
            </div>
            <div class="form-group">
              <input type="text" class="form-control mb-contact-from-input" id="exampleFormControlInput1" placeholder="Teléfono">
            </div>
            <div class="form-group">
              <textarea class="form-control mb-contact-from-input" id="exampleFormControlTextarea1" rows="5" placeholder="Comentario"></textarea>
            </div>
            <button type="submit" class="btn btn-block bg-main-color general-btn mt-4">Contactar</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Agenda Visita -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-2 mb-5">
        <div class="col-12 mt-4">
          <h5 class="mb-5">Agenda Visita</h5>
          <div class="row">
            <div id="datepicker-inline"></div>
          </div>
          <button type="submit" class="btn btn-block bg-main-color general-btn mt-4">Agenda</button>
        </div>
      </div>
    </div>
    <!-- Agregados recientemente  -->
    <x-side-recent-proyects />
  </div>
</div>
