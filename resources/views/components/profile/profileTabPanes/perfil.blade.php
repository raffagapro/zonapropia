@props([
  'user' => $user,
])

<div class="card shadow-sm">
    {{-- General info form --}}
    <div class="">
      {{-- Title --}}
      <h4 class="card-title mb-section-card-title mt-1 mb-4">Información general</h4>
      {{-- General info --}}
      <div class="container">
        <form action="{{ route('userProfile.update', $user->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" value="{{ $user->name }}">
            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $user->email }}">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Información</button>
        </form>
      </div>
    </div>

    {{-- Change password --}}
    <div class="">
      {{-- Title --}}
      <h4 class="card-title mb-section-card-title mt-1 mb-4">Cambiar Contraseña</h4>
      {{-- General info --}}
      <div class="container">
        <form action="{{ route('userProfile.updatePW', $user->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="password">Contraseña Actual</label>
            <input type="password" name="contraseña" class="form-control @error('contraseña') is-invalid @enderror" value="">
            @error('contraseña')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" name="nuevaContraseña" class="form-control @error('nuevaContraseña') is-invalid @enderror" value="">
            @error('nuevaContraseña')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Confirmar Contraseña </label>
            <input type="password" name="nuevaContraseña_confirmation" class="form-control @error('nuevaContraseña_confirmation') is-invalid @enderror" value="">
            @error('nuevaContraseña_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <button type="submit" class="btn bg-main-color navBar-btn text-light float-right mb-3">Actualizar Contraseña</button>
        </form>
      </div>
    </div>
  </div>