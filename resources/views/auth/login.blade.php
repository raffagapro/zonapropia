<form method="POST" action="{{ route('login') }}">
  @csrf
  {{-- Email --}}
  <div class="form-group">
    {{-- hidden input to let laravel know which tab to open --}}
    <input type="hidden" name="originTab" value="login">
    <input
      type="email"
      class="form-control @error('email') is-invalid @enderror"
      id="email"
      name="email"
      placeholder="Email"
      value="{{ old('email') }}"
      autocomplete="email" autofocus
    >
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  {{-- Password --}}
  <div class="form-group">
    <input
      type="password"
      class="form-control @error('password') is-invalid @enderror"
      id="contraseña"
      name="password"
      placeholder="Contraseña"
      autocomplete="current-password"
    >
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  {{-- Remember me --}}
  <div class="form-group mt-4">
    <div class="form-check form-check-inline">
      <input
        type="checkbox"
        class="form-check-input"
        name="remember"
        id="remember"
        {{ old('remember') ? 'checked' : '' }}
      >
      <label class="form-check-label login-modal-fp" for="exampleCheck1">Recordar</label>
    </div>
    <div class="form-check form-check-inline float-right">
      <a class="login-modal-link" href="{{ route('password.request') }}">Olvidaste la contraseña?</a>
    </div>
  </div>
  {{-- Login btn --}}
  <button type="submit" class="btn bg-main-color general-btn ">Ingresar</button>
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
