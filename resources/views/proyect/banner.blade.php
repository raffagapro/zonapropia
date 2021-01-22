<div class="slider-cont proyect-info"
  @if ($proyect->media->where('name', 'bannerf')->first() !== null)
    style="background-image:url({{ asset($proyect->media->where('name', 'banner')->first()->loc) }})"
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
            :par="'Encuentra una propiedad a tu medida, del resto nos encargamos nosotros. Te ayudamos brindándote toda la información de manera sencilla y transparente para que tomes la mejor decisión.'"
          />
        </div>
      </div>
      {{-- Right Panel --}}
      <div class="col-sm-6 col-lg-5 banner-rpanel">
        <div>
          @if ($proyect->getUF())
            <h1 class="banner-rtitle"><span class="banner-pretitle">Desde </span>UF {{ $proyect->getUF() }}</h1>
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
