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
          <h2 class="mb-info-title">Comparativa tipologías</h2>
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
        <!-- Tipologia Lista -->
        <div class="col-12 mt-5">
          <div class="row">
            @forelse ($proyect->getTipologias() as $tipo)
              <!-- Item List -->
              <div class="col-12 mb-4">
                <div class="row align-items-center">
                  <!-- Floor plan -->
                  <div class="col-12 col-md-3">
                    <img src="{{ asset($tipo->media) }}" class="cl-floor-img">
                  </div>
                  <!-- Info -->
                  <div class="col-12 col-md-9">
                    <div class="row">
                      <!-- Top Section -->
                      <div class="col-12">
                        <div class="row">
                          <!-- Title -->
                          <div class="col-md-6 col-lg-3">
                            <h4>Unidad: {{ $tipo->unidad->modelo }} Tipología: {{ $tipo->titulo }}</h4>
                          </div>
                          <div class="col-lg-1 cl-placeholder-ts"></div>
                          <div class="col-lg-2 cl-placeholder-ts"></div>
                          <div class="col-lg-2 cl-placeholder-ts"></div>
                        </div>
                      </div>
                      <!-- Divider-->
                      <div class="col-12">
                        <hr>
                      </div>
                      <!-- Bottom Section -->
                      <div class="col-12">
                        <!-- Info for LG version -->
                        <div class="row text-center cl-info-cont-lg">
                          <!-- Headers -->
                          <div class="col-lg-2"><small>m<sup>2</sup> Promedio</small></div>
                          <div class="col-lg-2"><small>UF m<sup>2</sup> Promedio</small></div>
                          <div class="col-lg-2"><small>Precio Promedio</small></div>
                          <div class="col-lg-2"><small>Posee terraza</small></div>
                          <div class="col-lg-2"><small>Nº de baños</small></div>
                          <div class="col-lg-2"><small>Nº Dormitorios</small></div>
                          <!-- Info -->
                          <div class="col-lg-2"><h5>{{ $tipo->unidad->superficie_total }}m<sup>2</sup></h5></div>
                          <div class="col-lg-2"><h5>UF {{ $tipo->unidad->uf_m2 }}</h5></div>
                          <div class="col-lg-2"><h5>UF {{ $tipo->unidad->precio_venta }}</h5></div>
                          <div class="col-lg-2">
                            @if ((int)$tipo->unidad->superficie_terrazas === 0 || $tipo->unidad->superficie_terrazas === null)
                              <h5>No</h5>
                            @else
                              <h5>Si</h5>
                            @endif
                          </div>
                          <div class="col-lg-2"><h5>{{ $tipo->unidad->banos }}</h5></div>
                          <div class="col-lg-2"><h5>{{ $tipo->unidad->dormitorios }}</h5></div>
                        </div>
                        <!-- Info for Tablet & Mobile version -->
                        <div class="row text-right cl-info-cont">
                          <!-- row -->
                          <div class="col-6"><small>m<sup>2</sup> Promedio</small></div>
                          <div class="col-6 text-center"><h5>{{ $tipo->unidad->superficie_total }}m<sup>2</sup></h5></div>
                          <!-- row -->
                          <div class="col-6"><small>UF m<sup>2</sup> Promedio</small></div>
                          <div class="col-6 text-center"><h5>UF {{ $tipo->unidad->uf_m2 }}</h5></div>
                          <!-- row -->
                          <div class="col-6"><small>Precio Promedio</small></div>
                          <div class="col-6 text-center"><h5>UF {{ $tipo->unidad->precio_venta }}</h5></div>
                          <!-- row -->
                          <div class="col-6"><small>Posee terraza</small></div>
                          <div class="col-6 text-center">
                            @if ((int)$tipo->unidad->superficie_terrazas === 0 || $tipo->unidad->superficie_terrazas === null)
                              <h5>No</h5>
                            @else
                              <h5>Si</h5>
                            @endif
                          </div>
                          <!-- row -->
                          <div class="col-6"><small>Nº de baños</small></div>
                          <div class="col-6 text-center"><h5>{{ $tipo->unidad->banos }}</h5></div>
                          <!-- row -->
                          <div class="col-6"><small>Nº Dormitorios</small></div>
                          <div class="col-6 text-center"><h5>{{ $tipo->unidad->dormitorios }}</h5></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 mb-4">
                <h3>Sin unidades</h3>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
