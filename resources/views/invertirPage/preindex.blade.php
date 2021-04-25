@extends('layouts.app')

@section('title', 'Por qué invertir')

@section('content')
  @include('invertirPage.prebanner')

  <div class="container mb-5">
    <div class="row my-5 py-3 text-center">
      <div class="col-6 mx-auto">
        <h1 class="page-title">¿Por qué invertir?</h1>
        <small class="invert-title">Es momento de pensar en tu futuro.</small>
      </div>
    </div>
    <div class="row my-2">
      <div class="col-12">
        <p class="page-body2">
          Nos encontramos en un periodo difícil, donde el mundo entero ha sido afectado por una pandemia. Pero como bien sabemos, las crisis siempre vienen acompañadas de oportunidades de todo tipo, y en esta ocasión es la de inversión.
        </p>
        <p class="page-body2">
          Invertir en bienes raíces es una apuesta casi segura, pues una propiedad suele aumentar de precio conforme pasa el tiempo. Es por esto que a continuación te dejamos 5 razones de por qué invertir:
        </p>
      </div>
    </div>

    {{-- 1. plusvalia  --}}
    <div class="row my-2 align-items-center mt-5">
      <div class="col-5">
        <small class="invp-super-title">Zonapropia</small>
        <h1 class="invp-title">1. Aumento de plusvalía</h1>
        <p>
          Al comprar un departamento, no solo estás invirtiendo en un hogar para futuro, si no que también estás rentabilizando esa propiedad, ya que con el paso de los años las viviendas cada vez suben más su precio.
        </p>
      </div>
      <div class="col-1"></div>
      <div class="col-6">
        <img src="{{ asset('assets/images/invp-plusvalia.png') }}" alt="" style="width: 100%; height: auto;">
      </div>
    </div>

    {{-- spacer --}}
    <div style="height: 50px;"></div>

    {{-- 2. patrimonio  --}}
    <div class="row my-2 align-items-center mt-5">
      <div class="col-6">
        <img src="{{ asset('assets/images/invp-patrimonio.png') }}" alt="" style="width: 100%; height: auto;">
      </div>
      <div class="col-5">
        <small class="invp-super-title">Zonapropia</small>
        <h1 class="invp-title">2. Patrimonio heredable para tu familia</h1>
        <p>
          Pensar en la familia y sobre todo en los hijos, es una prioridad para los inversionistas inmobiliarios. Uno de los beneficios de invertir en propiedades es que las viviendas que compres te generarán ingresos de flujo permanentes que sean heredables para tus hijos, asegurando su vida financieramente. De esta manera, tendrás la tranquilidad que tu familia disfrutará de una base económica consolidada.
        </p>
      </div>
    </div>

    {{-- spacer --}}
    <div style="height: 50px;"></div>

    {{-- 3. recuperar  --}}
    <div class="row my-2 align-items-center mt-5">
      <div class="col-5">
        <small class="invp-super-title">Zonapropia</small>
        <h1 class="invp-title">3. Recuperar la inversion</h1>
        <p>
          Al optar por el crédito hipotecario de un 80-90% obtener una vivienda cuyo dividendo podría ser pagado con el monto del arriendo de este mismo. Debido a esta razón, podrás recuperar la inversión inicial y en un plazo de 20 a 25 años estarás ganando mensualmente el arriendo de la propiedad que compraste, o podrás seguir invirtiendo en más propiedades multiplicando el proceso de tus ingresos, ganando la libertad financiera que tanto deseas.
        </p>
      </div>
      <div class="col-1"></div>
      <div class="col-6">
        <img src="{{ asset('assets/images/invp-recuperar.png') }}" alt="" style="width: 100%; height: auto;">
      </div>
    </div>

    {{-- spacer --}}
    <div style="height: 50px;"></div>

    {{-- 4. seguro vida  --}}
    <div class="row my-2 align-items-center mt-5">
      <div class="col-6">
        <img src="{{ asset('assets/images/invp-seguro.png') }}" alt="" style="width: 100%; height: auto;">
      </div>
      <div class="col-5">
        <small class="invp-super-title">Zonapropia</small>
        <h1 class="invp-title">4. Contar con un seguro de vida</h1>
        <p>
          En caso de fallecimiento del titular, se cuenta con un seguro de vida, el cual tiene la salvedad de dejar el inmueble completamente costeado. Por ende, en vez de estar pagando un seguro de vida para tus hijos, otros lo estarían pagando directamente a través del arriendo de tu inmueble.
        </p>
      </div>
    </div>

    {{-- spacer --}}
    <div style="height: 50px;"></div>

    {{-- 5. jubilacion  --}}
    <div class="row my-2 align-items-center mt-5">
      <div class="col-5">
        <small class="invp-super-title">Zonapropia</small>
        <h1 class="invp-title">5. Completar tu jubilación</h1>
        <p>
          Una de las opciones que puedes tener para complementar y mejorar tu jubilación a futuro es invertir en una propiedad. Ésta te dará la libertad financiera que tanto deseas, y podrás realizar viajes y darte los gustos que quieres.
        </p>
      </div>
      <div class="col-1"></div>
      <div class="col-6">
        <img src="{{ asset('assets/images/invp-jubilacion.png') }}" alt="" style="width: 100%; height: auto;">
      </div>
    </div>

    @php
      $post = App\Models\Post::all();
    @endphp
    @if (count($post) > 0)
      <div class="row mt-5">
        <div class="col mt-5 text-center">
          <h3 class="page-text">Lorem Ipsum</h3>
          <a href="{{ route('post.indexPost')}}" class="main-color">
            Ver acticulos
          </a>
        </div>
      </div>
      <div class="row my-4  py-2">
        <x-blog.relateditem :post="$post[0]"/>
        @isset($post[1])
          <x-blog.relateditem :post="$post[1]"/>
        @endisset
        @isset($post[2])
          <x-blog.relateditem :post="$post[2]"/>
        @endisset
      </div> 
    @else
        
    @endif
  </div>

@endsection

{{-- @section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/range-jqui/range_style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/select2/select2.css') }}"/>
@endsection

@section('scripts')
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <script src="{{ asset('js/ajax/regionSwitcherHome.js') }}" ></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection --}}
