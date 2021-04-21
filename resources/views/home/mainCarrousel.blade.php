<div class="slider-cont">
  <div class="container">
    <div class="row align-items-center pt-5">
      {{-- Left Panel --}}
      <div class="col-sm-6 col-lg-7 slider-lpanel">
        @php
          $subtitle='Zonapropia';
          $title='Propiedades';
          $par='Encuentra una propiedad a tu medida, del resto nos encargamos nosotros. Te ayudamos brindándote toda la información de manera sencilla y transparente para que tomes la mejor decisión.'
        @endphp
        <x-triTitle-white :subtitle="$subtitle" :title="$title" :par="$par"/>
      </div>

      {{-- Right Panel --}}
      <div class="col-sm-6 col-lg-5">
        <div class="card slider-rcardpanel">
          <div class="card-body">
            <form class="mainSearchPanel" action="{{ route('proyects.search') }}" method="POST">
              @csrf
              <div class="form-group">
                <h3>Buscador</h3>
              </div>

              <div class="form-group">
                <select class="form-control" name="tag">
                  <option value="" selected>Tipo de compra</option>
                  @foreach (App\Models\Taggable::all() as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <select class="form-control" name="cat">
                  <option value="" selected>Tipo de propiedad</option>
                  @foreach (App\Models\Categoria::all() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                @php $regions = App\Models\Region::all(); @endphp
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <select class="form-control" name="region" id="region">
                  <option value="z" selected>Region</option>
                  @foreach ($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <select class="form-control" name="comuna" id="comuna">
                  <option value="" selected>Comuna</option>
                  @foreach ($regions[0]->getComunas() as $comuna)
                    <option value="{{ $comuna->id }}">{{ $comuna->name }}</option>
                  @endforeach
                </select>
              </div>
              
              <div class="form-group">
                <label for="formControlRange">Precio: UF <span id="ufmin">0</span> - UF <span id="ufmax">10000</span></label>
                <div slider id="slider-distance">
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

              <button type="submit" class="btn btn-block bg-main-color general-btn">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>