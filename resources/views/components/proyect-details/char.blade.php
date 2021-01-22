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
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim, quis nostrud. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco…
          </p>
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
              <div class="carousel-item active">
                <img src="./assets/images/proyect_info_banner.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./assets/images/proyect_info_banner.png" class="d-block w-100" alt="...">
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
            <!-- item -->
            <div class="col-md-6">
              <div class="row align-items-center">
                <div class="col-3 char-icon-con pl-0 pr-0">
                  <div class="circle-cont-icon">
                    <i class="fas fa-laptop circle-icon fa-2x text-light"></i>
                  </div>
                </div>
                <div class="col-9">
                  <h4>Piscina</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                  </p>
                </div>
              </div>
            </div>
            <!-- item -->
            <div class="col-md-6">
              <div class="row align-items-center">
                <div class="col-3 char-icon-con pl-0 pr-0">
                  <div class="circle-cont-icon">
                    <i class="fas fa-laptop circle-icon fa-2x text-light"></i>
                  </div>
                </div>
                <div class="col-9">
                  <h4>Gimnasio</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                  </p>
                </div>
              </div>
            </div>
            <!-- item -->
            <div class="col-md-6">
              <div class="row align-items-center">
                <div class="col-3 char-icon-con pl-0 pr-0">
                  <div class="circle-cont-icon">
                    <i class="fas fa-laptop circle-icon fa-2x text-light"></i>
                  </div>
                </div>
                <div class="col-9">
                  <h4>Áreas verdes</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                  </p>
                </div>
              </div>
            </div>
            <!-- item -->
            <div class="col-md-6">
              <div class="row align-items-center">
                <div class="col-3 char-icon-con pl-0 pr-0">
                  <div class="circle-cont-icon">
                    <i class="fas fa-laptop circle-icon fa-2x text-light"></i>
                  </div>
                </div>
                <div class="col-9">
                  <h4>Áreas comunes</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                  </p>
                </div>
              </div>
            </div>
            <!-- item -->
            <div class="col-md-6">
              <div class="row align-items-center">
                <div class="col-3 char-icon-con pl-0 pr-0">
                  <div class="circle-cont-icon">
                    <i class="fas fa-laptop circle-icon fa-2x text-light"></i>
                  </div>
                </div>
                <div class="col-9">
                  <h4>Número de departamentos</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
