@if (count($proyect->tipografias) !== 0)
    <div class="card mb-section-card mt-0">
        <div class="card-body row mt-5 mb-5">
            <!-- Title -->
            <div class="col-6">
                <h3 class="mb-info-title">Cotizador</h3>
            </div>
            <div class="col-6 text-right">
                @if (count($proyect->tipografias) !== 0)
                    <h4 class="mb-info-title">Tipologias</h4>
                    {{-- <h4 class="mb-info-title">Tipologia: {{ $proyect->tipografias->first()->modelo }}</h4> --}}
                @endif
            </div>
            
            <!-- Map Carrousel -->
            @if (count($proyect->tipografias) !== 0)
                <div class="col-12 mt-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @php $hGo = 0;@endphp
                        @foreach ($proyect->tipografias as $tipo)
                            @if ($hGo === 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $hGo }}" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to={{ $hGo }}></li>
                            @endif
                            @php $hGo++;@endphp
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @php $gGo = 0;@endphp
                        @foreach ($proyect->tipografias as $tipo)
                            @if ($gGo === 0)
                                <div class="carousel-item active">
                                    <img src="{{ asset($tipo->tipologia) }}" class="d-block h-40" alt="...">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ asset($tipo->tipologia) }}" class="d-block h-40" alt="...">
                                </div>
                            @endif
                            @php $gGo++;@endphp
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
            @endif

            {{-- from --}}
            <div class="col-12 mt-4">
                <form>
                    <div class="form-row">
                        {{-- Tipologias  --}}
                        <div class="col-md-6 mb-3">
                            <select class="form-control" name="tipologia">
                                <option selected disabled>Tipologia</option> 
                                @foreach ($proyect->tipografias as $tipo)
                                    <option value="{{ $tipo->id }}">{{ $tipo->modelo }}</option> 
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
@endif