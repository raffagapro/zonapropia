@if (count($proyect->getTipologias()) !== 0)
    <div class="card mb-section-card mt-0">
        <div class="card-body row mt-5 mb-5">
            <!-- Title -->
            <div class="col-6">
                <h3 class="mb-info-title">Cotizador</h3>
            </div>
            <div class="col-6 text-right">
                <h4 class="mb-info-title">
                    Tipologias: 
                    <span id="tipoTitleCont">{{ $proyect->unidades[0]->tipologias[0]->titulo }}</span>
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
            <div class="col-12 mt-4 text-center" id="tipoImgCont">
                <img src="{{ asset($proyect->unidades[0]->tipologias[0]->media) }}" alt="">
            </div>

            {{-- from --}}
            <div class="col-12 mt-4">
                <form>
                    <div class="form-row">
                        {{-- Tipologias  --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" name="tipologia" id="tipologia">
                                <option selected disabled>Tipologias</option> 
                                @foreach ($proyect->unidades[0]->tipologias as $tipoz)
                                    <option value="{{ $tipoz->id }}">{{ $tipoz->titulo }}</option> 
                                @endforeach
                                {{-- @foreach ($proyect->unidades as $unidad)
                                    <option value="{{ $unidad->id }}">{{ $unidad->dormitorios }} Drom. - {{ $unidad->banos }} Baños</option> 
                                @endforeach --}}
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
                        <select class="form-control" name="orientacion">
                            <option selected disabled>Orientacion</option> 
                            <option value=0 >Sin Orientación</option>
                            <option value=1 >Sur Poniente</option>
                            <option value=1 >Nor Oriente</option>
                        </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>Piso</option>
                            @foreach ($proyect->getPisos() as $p)
                                <option>{{ $p }}</option> 
                            @endforeach
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
@endif   
