<form method="POST" action="{{ route('register') }}">
  @csrf
  {{-- name --}}
  <div class="form-group">
    {{-- hidden input to let laravel know which tab to open --}}
    <input type="hidden" name="originTab" value="register">
    <input type="text"
      class="form-control @error('nombre') is-invalid @enderror"
      id="nombre"
      name="nombre"
      value="{{ old('nombre') }}"
      autocomplete="nombre" autofocus
      placeholder="Nombre"
    >
    @error('nombre')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  {{-- email --}}
  <div class="form-group">
    <input type="email"
      class="form-control @error('email') is-invalid @enderror"
      id="email"
      name="email"
      value="{{ old('email') }}"
      autocomplete="email"
      placeholder="Email"
    >
    @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  {{-- password --}}
  <div class="form-group">
    <input type="password"
      class="form-control @error('contraseña') is-invalid @enderror"
      id="contraseña"
      name="contraseña"
      placeholder="Contraseña"
      autocomplete="new-password"
    >
    @error('contraseña')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  {{-- confirm password --}}
  <div class="form-group">
    <input type="password"
      class="form-control"
      id="contraseña_confirmation"
      name="contraseña_confirmation"
      placeholder="Confirmar Contraseña"
      autocomplete="new-password"
    >
  </div>

  <button type="submit" class="btn bg-main-color general-btn mt-2">Registrarse</button>
</form>
{{-- <div class="mt-4">
  <h6>Ingresar Con:</h6>
  <a href="#" class="sm-login-icons">
    <i class="fab fa-instagram-square insta"></i>
  </a>
  <a href="#" class="sm-login-icons">
    <i class="fab fa-facebook-square fb"></i>
  </a>
  <a href="#" class="sm-login-icons">
    <i class="fab fa-linkedin lnkd"></i>
  </a>
</div> --}}
