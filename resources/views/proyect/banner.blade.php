<div class="slider-cont proyect-info"
  @if ($proyect->media->where('name', 'banner')->first() !== null)
    style="background-image:url({{ Storage::url($proyect->media->where('name', 'banner')->first()->loc) }})"
  @endif
>
  <div class="container">
    <div class="row align-items-end banner-cont-500">
      {{-- Left Panel --}}
      <div class="col-sm-6 col-lg-7 banner-lpanel">
        <div>
          <x-triTitle
            :subtitle="$proyect->comuna->name"
            :title="$proyect->name"
            :par="$proyect->texto_destacado"
          />
        </div>
        <div class="row">
          <div class="col-4">
            <button class="btn btn-block text-light bg-main-color">Cotizar</button>
          </div>
          <div class="col-4">
            <button class="btn btn-block text-light bg-main-color">Reserva Online</button>
          </div>
        </div>
      </div>
      {{-- Right Panel --}}
      <div class="col-sm-6 col-lg-5 banner-rpanel">
        <div class="mb-3">
          @foreach ($proyect->tags as $tag)
            <span class="badge cust-badges badge-{{ $tag->color }} mr-1">{{ $tag->name }}</span>
          @endforeach
        </div>
        <div>
          @if ($proyect->getUF())
            <h1 class="banner-rtitle"><span class="banner-pretitle">Desde </span>{{ $proyect->getUF() }}</h1>
          @else
            <h1 class="banner-rtitle"><span class="banner-pretitle">Próximamente</h1>
          @endif
          {{-- <h1 class="rating-cont-banner">
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating"></i>
            <i class="fas fa-star star-rating text-light"></i>
          </h1> --}}
        </div>
      </div>
    </div>
  </div>
</div>
