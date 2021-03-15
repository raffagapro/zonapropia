<div class="col-md-3 leftbar-cont">
  <!-- Main Form -->
  <form class="mainSearchPanel" action="{{ route('proyects.search') }}" method="POST">
    @csrf

    <div class="form-group">
      <select class="form-control" name="tag">
        <option value="" selected>Tipo de compra</option>
        @foreach (App\Models\Taggable::all() as $tagz)
          <option value="{{ $tagz->id }}" @isset($tag) @if ((int)$tag->id === (int)$tagz->id) selected @endif @endisset>{{ $tagz->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <select class="form-control" name="cat">
        <option value="" selected>Tipo de propiedad</option>
        @foreach (App\Models\Categoria::all() as $catz)
          <option value="{{ $catz->id }}" @isset($cat) @if ((int)$cat->id === (int)$catz->id) selected @endif @endisset>{{ $catz->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      @php $regions = App\Models\Region::all(); @endphp
      <select class="form-control" name="region" id="region">
        <option value="" selected>Region</option>
        @foreach ($regions as $regionz)
          <option value="{{ $regionz->id }}" @isset($region) @if ((int)$region->id === (int)$regionz->id) selected @endif @endisset>{{ $regionz->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <select class="form-control" name="comuna" id="comuna">
        <option value="" selected>Comuna</option>
        @if (isset($comuna))
          @foreach ($comuna->provincia->comunas as $comunaz)
            <option value="{{ $comunaz->id }}" @isset($comuna) @if ((int)$comuna->id === (int)$comunaz->id) selected @endif @endisset>{{ $comunaz->name }}</option>
          @endforeach     
        @else
          @foreach ($regions[0]->provincias[0]->comunas as $comunaz)
            <option value="{{ $comunaz->id }}">{{ $comunaz->name }}</option>
          @endforeach    
        @endif
      </select>
    </div>

    <div class="form-group mb-4">
      <label for="formControlRange">Precio: UF <span id="ufmin">0</span> - UF <span id="ufmax">10000</span></label>
      <div slider id="slider-price">
        <div>
          <div inverse-left style="width:00%;"></div>
          <div inverse-right style="width:100%;"></div>
          <div range style="left:0%;right:0%;"></div>
          <span thumb style="left:0%;"></span>
          <span thumb style="left:100%;"></span>
          <div sign style="left:0%; display:none;">
            <span id="value">0</span>
          </div>
          <div sign style="left:100%; display:none;">
            <span id="value">10000</span>
          </div>
        </div>
        <input id="min_price" type="range" name="minUF" tabindex="0" value="0" max="9900" min="0" step="100" oninput="
        this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
        var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
        var children = this.parentNode.childNodes[1].childNodes;
        children[1].style.width=value+'%';
        children[5].style.left=value+'%';
        children[7].style.left=value+'%';children[11].style.left=value+'%';
        children[11].childNodes[1].innerHTML=this.value;" />
      
        <input id="max_price" type="range" name="maxUF" tabindex="0" value="10000" max="10000" min="100" step="100" oninput="
        this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
        var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
        var children = this.parentNode.childNodes[1].childNodes;
        children[3].style.width=(100-value)+'%';
        children[5].style.right=(100-value)+'%';
        children[9].style.left=value+'%';children[13].style.left=value+'%';
        children[13].childNodes[1].innerHTML=this.value;" />
      </div>
    </div>

    <button type="submit" class="btn bg-main-color general-btn mb-2">Buscar</button>
    <a href="{{ route('proyects.index')}}" class="btn bg-main-color general-btn mt-2">Remover Filtros</a>
  </form>

  @isset($cat)
    <!-- Unidades Filter Panel -->
    <div class="unidad-filter-cont">
      <!-- Rooms -->
      <div class="filter-cont">
        <h5 class="uf-cont-title">Dormitorios</h5>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">1 Dormitorio</p></div>
          <div class="col-6 text-right"><p class="m-0">(4)</p></div>
        </div>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">2 Dormitorios</p></div>
          <div class="col-6 text-right"><p class="m-0">(1)</p></div>
        </div>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">3 Dormitorios</p></div>
          <div class="col-6 text-right"><p class="m-0">(1)</p></div>
        </div>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">4 Dormitorios+</p></div>
          <div class="col-6 text-right"><p class="m-0">(4)</p></div>
        </div>
        <form class="mm-filter-cont">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control mm-filter-input" placeholder="Mínimo">
            </div>
            &nbsp;-&nbsp;
            <div class="col">
              <input type="text" class="form-control mm-filter-input" placeholder="Máximo">
            </div>
            <div class="col">
              <input type="text" class="form-control mm-filter-input" disabled>
            </div>
          </div>
        </form>
      </div>
  
      <!-- Bathrooms -->
      <div class="filter-cont">
        <h5 class="uf-cont-title">Baños</h5>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">1 Baño</p></div>
          <div class="col-6 text-right"><p class="m-0">(4)</p></div>
        </div>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">2 Baños</p></div>
          <div class="col-6 text-right"><p class="m-0">(1)</p></div>
        </div>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">3 Baños</p></div>
          <div class="col-6 text-right"><p class="m-0">(1)</p></div>
        </div>
        <div class="row uf-room-item">
          <div class="col-6"><p class="m-0">4 Baños+</p></div>
          <div class="col-6 text-right"><p class="m-0">(4)</p></div>
        </div>
        <form class="mm-filter-cont">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control mm-filter-input" placeholder="Mínimo">
            </div>
            &nbsp;-&nbsp;
            <div class="col">
              <input type="text" class="form-control mm-filter-input" placeholder="Máximo">
            </div>
            <div class="col">
              <input type="text" class="form-control mm-filter-input" disabled>
            </div>
          </div>
        </form>
      </div>
  
      <!-- Price Sliders -->
      <div class="filter-cont">
        <form class="mainSearchPanel">
  
          <div class="form-group">
            <label for="formControlRange">Superficie Total: <span id="sqmin">0</span> m<sup>2</sup> - <span id="sqmax">300</span>m<sup>2</sup></label>
            <div slider id="slider-superficie">
              <div>
                <div inverse-left style="width:00%;"></div>
                <div inverse-right style="width:100%;"></div>
                <div range style="left:0%;right:0%;"></div>
                <span thumb style="left:0%;"></span>
                <span thumb style="left:100%;"></span>
                <div sign style="left:0%; display:none;">
                  <span id="value">0</span>
                </div>
                <div sign style="left:100%; display:none;">
                  <span id="value">10000</span>
                </div>
              </div>
              <input id="min_sq" type="range" name="minSQ" tabindex="0" value="0" max="290" min="0" step="10" oninput="
              this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
              var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
              var children = this.parentNode.childNodes[1].childNodes;
              children[1].style.width=value+'%';
              children[5].style.left=value+'%';
              children[7].style.left=value+'%';children[11].style.left=value+'%';
              children[11].childNodes[1].innerHTML=this.value;" />
            
              <input id="max_sq" type="range" name="maxSQ" tabindex="0" value="300" max="300" min="10" step="10" oninput="
              this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
              var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
              var children = this.parentNode.childNodes[1].childNodes;
              children[3].style.width=(100-value)+'%';
              children[5].style.right=(100-value)+'%';
              children[9].style.left=value+'%';children[13].style.left=value+'%';
              children[13].childNodes[1].innerHTML=this.value;" />
            </div>
          </div>
  
          {{-- <div class="form-group">
            <label for="formControlRange">Superficie Útil: 0 m<sup>2</sup> - 45m<sup>2</sup></label>
            <div slider id="slider-superficie">
              <div>
                <div inverse-left style="width:00%;"></div>
                <div inverse-right style="width:100%;"></div>
                <div range style="left:0%;right:0%;"></div>
                <span thumb style="left:0%;"></span>
                <span thumb style="left:100%;"></span>
                <div sign style="left:0%; display:none;">
                  <span id="value">0</span>
                </div>
                <div sign style="left:100%; display:none;">
                  <span id="value">10000</span>
                </div>
              </div>
              <input id="min_sq" type="range" name="minSQ" tabindex="0" value="0" max="290" min="0" step="10" oninput="
              this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
              var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
              var children = this.parentNode.childNodes[1].childNodes;
              children[1].style.width=value+'%';
              children[5].style.left=value+'%';
              children[7].style.left=value+'%';children[11].style.left=value+'%';
              children[11].childNodes[1].innerHTML=this.value;" />
            
              <input id="max_sq" type="range" name="maxSQ" tabindex="0" value="300" max="300" min="10" step="10" oninput="
              this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
              var value=(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.value)-(100/(parseInt(this.max)-parseInt(this.min)))*parseInt(this.min);
              var children = this.parentNode.childNodes[1].childNodes;
              children[3].style.width=(100-value)+'%';
              children[5].style.right=(100-value)+'%';
              children[9].style.left=value+'%';children[13].style.left=value+'%';
              children[13].childNodes[1].innerHTML=this.value;" />
            </div>
          </div> --}}
        </form>
      </div>
  
      <!-- Floors and Misc -->
      <div class="filter-cont">
        <h5 class="uf-cont-title">Piso</h5>
        <form class="mm-filter-cont mb-3">
          <div class="form-row">
            <div class="col">
              <select class="form-control" id="exampleFormControlSelect1">
                <option value="" disabled selected>Piso</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>
          </div>
        </form>
        <div class="uf-room-item">
          <span class="badge badge-secondary filter-floor-badge">5
            <a href="#"><i class="fas fa-times text-light"></i></a>
          </span>
          <span class="badge badge-secondary filter-floor-badge">5
            <a href="#"><i class="fas fa-times text-light"></i></a>
          </span>
        </div>
        <form class="mm-filter-cont mb-3">
          <div class="form-row">
            <div class="col">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label uf-cont-title mb-0" for="defaultCheck1">
                  Estacionamiento
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                <label class="form-check-label uf-cont-title mb-0" for="defaultCheck2">
                  Bodega
                </label>
              </div>
            </div>
          </div>
        </form>
  
      </div>
    </div>  
  @endisset
</div>
