<div class="section-cont" id="vendeForm">
  {{-- Title --}}
  <div class="row text-center section-title-cont">
    <div class="col">
      <h1 class="section-title">¿Cómo vender una propiedad?</h1>
      <p class="section-body emb">
        Si quieres vender una propiedad, escríbenos un mensaje con toda la información (tipo de propiedad, ubicación, precio, etc). Luego, nosotros te contactaremos para acordar coordinar todos los detalles.
      </p>
    </div>
  </div>
  {{-- Form --}}
  <div class=" pt-1 pb-80">
    <h3 class="text-center mini-title">Formulario de contacto</h3>
    <hr class="divider">
    <form action="{{ route('contactForm.store') }}" method="POST">
      @csrf
      <!-- nombre / apellido / email -->
      <div class="form-row main-from-row">
        <div class="form-group col-md-4">
          <label for="name">Nombre</label>
          <input type="text" class="form-control main-form" name="name" placeholder="Nombre">
        </div>
        <div class="form-group col-md-4">
          <label for="last_name">Apellido</label>
          <input type="text" class="form-control main-form" name="last_name" placeholder="Apellido">
        </div>
        <div class="form-group col-md-4">
          <label for="mail">Mail</label>
          <input type="email" class="form-control  main-form" name="mail" placeholder="Mail">
        </div>
      </div>
      <!-- telefono / tipo prop / price -->
      <div class="form-row main-from-row">
        <div class="form-group col-md-4">
          <label for="phone">Teléfono</label>
          <input type="text" class="form-control main-form" name="phone" placeholder="+56 9">
        </div>
        <div class="form-group col-md-4">
          <label for="category">Tipo de propiedad</label>
          <select name="category" class="form-control main-form">
            @foreach ($cats as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="priceRange">Rango de precio</label>
          <select name="priceRange" class="form-control main-form">
            <option value="1000">0 -  1000 UF</option>
            <option value="2000">1001 -  2000 UF</option>
            <option value="2000+">2001+ UF</option>
          </select>
        </div>
      </div>
      <!-- Message -->
      <div class="form-group main-from-row">
        <label for="message">Mensaje (Requerido)</label>
        <textarea class="form-control main-form" name="message" rows="6"></textarea>
      </div>
      <button type="submit" class="btn btn-primary main-form-btn">Enviar mensaje</button>
    </form>
  </div>
</div>