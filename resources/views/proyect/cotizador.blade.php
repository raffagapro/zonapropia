@if (count($proyect->unidades) !== 0)
{{--  @if (count($proyect->getTipologias()) !== 0)  --}}
    <div class="card mb-section-card mt-0">
        <div class="card-body row mt-5 mb-5">
            <!-- Title -->
            <div class="col-6">
                <h3 class="mb-info-title">Cotizador</h3>
            </div>
            <div class="col-6 text-right">
                <h4 class="mb-info-title">
                    Tipologias: 
                    <span id="tipoTitleCont">{{ $proyect->unidades[0]->modelo }}</span>
                </h4>
            </div>
            
            <!-- Map Carrousel -->
            {{-- @if (count($proyect->getTipologias()) !== 0)
                <div class="col-12 mt-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @php $hGo = 0;@endphp
                        @foreach ($proyect->unidades as $u2)
                            @foreach ($u2->tipologias as $t2)
                            @if ($hGo === 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $hGo }}" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $hGo }}"></li>
                            @endif
                            @php $hGo++;@endphp
                            @endforeach
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @php $gGo = 0;@endphp
                        @foreach ($proyect->unidades as $u3)
                            @foreach ($u3->tipologias as $t3)
                            @if ($gGo === 0)
                                <div class="carousel-item active">
                                    <img src="{{ asset($t3->media) }}" class="d-block h-40" alt="...">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset($t3->media) }}" class="d-block h-40" alt="...">
                                </div>
                            @endif
                            @php $gGo++;@endphp
                            @endforeach
                        @endforeach
                        
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
            @endif --}}
            @if (count($proyect->unidades[0]->tipologias) !== 0)
                <div class="col-12 mt-4 text-center" id="tipoImgCont">
                    <img src="{{ Storage::url($proyect->unidades[0]->tipologias[0]->media) }}" alt="">
                </div>
            @endif

            {{-- from --}}
            <div class="col-12 mt-4">
                <form action="{{ route('cotizacion.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        {{-- Tipologias  --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" name="tipologia" id="tipologia">
                                <option selected disabled>Tipologias</option> 
                                @foreach ($proyect->getTipologias2() as $t2)
                                    <option value="{{ $t2[1][0].','.$t2[1][1] }}">{{ $t2[0] }}</option> 
                                @endforeach
                            </select>
                        </div>

                        {{-- modelo  --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" id="model" name="model">
                                <option selected disabled>Modelo</option>
                                @foreach ($proyect->unidades as $unidad)
                                    <option value="{{ $unidad->id }}">{{ $unidad->modelo }}</option> 
                                @endforeach
                            </select>
                        </div>

                        {{-- orientacion --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" id="orientacion" name="orientacion">
                                <option selected disabled>Orientacion</option> 
                                <option value=0 >Sin Orientación</option>
                                <option value=1 >Sur Poniente</option>
                                <option value=2 >Nor Oriente</option>
                            </select>
                        </div>
                        
                        {{-- Piso --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" id="piso" name="piso">
                                <option selected disabled>Piso</option>
                                @foreach ($proyect->getPisos() as $p)
                                    <option value="{{ $p }}">{{ $p }}</option> 
                                @endforeach
                            </select>
                        </div>

                        {{-- Rut --}}
                        <div class="col-md-6 mb-3" id="rutCont" style="display: none">
                            <input type="text" class="form-control mb-contact-from-input" name="rut" placeholder="¿Cuál es tu rut?">
                        </div>

                        {{-- Nombre Completo --}}
                        <div class="col-md-6 mb-3" id="nameCont" style="display: none">
                            <input type="text" class="form-control mb-contact-from-input" name="nombre" placeholder="Nombre completo">
                        </div>

                        {{-- telefono --}}
                        <div class="col-md-6 mb-3" id="phoneCont" style="display: none">
                            <input type="text" class="form-control mb-contact-from-input" name="phone" placeholder="Teléfono">
                        </div>

                        {{-- email --}}
                        <div class="col-md-6 mb-3" id="emailCont" style="display: none">
                            <input type="text" class="form-control mb-contact-from-input" name="email" placeholder="¿Cuál es tu email?">
                        </div>

                        {{-- estacionamiento --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" id="estacionamiento" name="estacionamiento">
                                <option selected disabled>Estacionamiento</option>
                                @foreach ($proyect->estacionamientos()->get() as $e)
                                    @if ($e->status === 1)
                                        <option value="{{ $e->id }}">{{ $e->name.' (Piso'.$e->piso.')' }}</option> 
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <div class="text-center mb-2" id="errorCont" style="display: none">
                                <i class="fas fa-exclamation-circle text-danger"></i>
                                <small class="text-danger text-center">¡Necesitas seleccionar un modelo!</small>
                            </div>
                            <input type="hidden" id="unidadId">
                            <button id="contBtn" class="btn btn-block bg-main-color general-btn">Continuar</button>
                            <button type="submit" id="sendCotBtn" class="btn btn-block bg-main-color general-btn" style="display: none">Enviar Cotizacion</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif   
