@props([
  'proyect' => $proyect,
])

<div class="row">
  <!-- Top Panel -->
  <div class="col-12">
    <!-- Proyect Info -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-5 mb-5">
        <!-- Title -->
        <div class="col-md-6">
          <h2 class="mb-info-title">Características</h2>
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
        @if (count($proyect->getAllMediaCara()) > 0)
          {{-- title --}}
          <div class="col-12 mt-4">
            <h3 class="mb-datos-title">Galería</h3>
          </div>
          {{-- gallery --}}
          <div class="col-12 mt-4">
            <div id="carouselCara" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                @php $c = 0; @endphp
                @foreach ($proyect->getAllMediaCara() as $mc)
                  <li data-target="#carouselCara" data-slide-to="{{ $c }}" @if ($c === 0) class="active" @endif></li>
                  @php $c++; @endphp
                @endforeach
              </ol>
              <div class="carousel-inner">
                @php $d = 0; @endphp
                @foreach ($proyect->getAllMediaCara() as $mc)
                  <div class="carousel-item @if ($d === 0) active @endif">
                    <img src="{{ Storage::url($mc->loc) }}" class="d-block w-100" alt="...">
                  </div>
                  @php $d++; @endphp
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselCara" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselCara" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        @endif
      </div>
    </div>

    <!-- Características -->
    <div class="card mb-section-card mt-0">
      <div class="card-body row mt-5 mb-5">
        <!-- Title -->
        <div class="col">
          <h2 class="mb-info-title">Características del proyecto</h2>
          <small class="mb-section-card-item"><i class="fas fa-map-marker-alt" style="color:red;"></i> San Miguel - Condominio San Nicolás</small>
        </div>

        <!-- Gallery -->
        <div class="col-12 mt-4">
          <div class="row">
            @forelse ($proyect->caracteristicas as $car)
              <!-- item -->
              <div class="col-md-6">
                <div class="row align-items-center">
                  <div class="col-3 char-icon-con pl-0 pr-0">
                    <div class="circle-cont-icon">
                      <i class="{{ $car->icono }} circle-icon fa-2x text-light"></i>
                    </div>
                  </div>
                  <div class="col-9">
                    <h4>{{ $car->name }}</h4>
                    <p>{{ $car->descripcion }}</p>
                  </div>
                </div>
              </div>
            @empty

            @endforelse
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
