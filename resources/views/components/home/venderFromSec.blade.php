<div class="section-cont">
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
    <form>
      <!-- nombre / apellido / email -->
      <div class="form-row main-from-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Nombre</label>
          <input type="text" class="form-control main-form" id="name" placeholder="Nombre">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Apellido</label>
          <input type="text" class="form-control main-form" id="inputPassword4" placeholder="Apellido">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Mail</label>
          <input type="email" class="form-control  main-form" id="inputPassword4" placeholder="Mail">
        </div>
      </div>
      <!-- telefono / tipo prop / price -->
      <div class="form-row main-from-row">
        <div class="form-group col-md-4">
          <label for="inputEmail4">Teléfono</label>
          <input type="text" class="form-control main-form" id="inputEmail4" placeholder="+56 9">
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Tipo de propiedad</label>
          <select id="inputState" class="form-control main-form">
            <option selected>Proyecto</option>
            <option>...</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="inputPassword4">Rango de precio</label>
          <select id="inputState" class="form-control main-form">
            <option selected>Desde 2.000 UF</option>
            <option>...</option>
          </select>
        </div>
      </div>
      <!-- Message -->
      <div class="form-group main-from-row">
        <label for="inputAddress">Mensaje (Requerido)</label>
        <textarea class="form-control main-form" id="exampleFormControlTextarea1" rows="6"></textarea>
      </div>
      <button type="submit" class="btn btn-primary main-form-btn">Enviar email</button>
    </form>
  </div>
</div>
