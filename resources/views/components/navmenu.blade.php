<nav class="navbar navbar-expand-lg navbar-light navbar-bg">
  <div class="container">
    {{-- Main Logo --}}
    <a class="navbar-brand mt-2 mb-2" href="{{ route('home')}}">
      <img class="nav-bar-logo" src="./assets/images/logos/zp_logo.png" alt="" loading="lazy">
    </a>
    {{-- Responsive BTNs --}}
    <div>
      <button class="nbtis navbar-toggler bg-main-color text-light" type="submit">
        <i class="fas fa-dollar-sign"></i>
      </button>
      <button style="border-color: #62A4C0;" class="nbtis navbar-toggler" type="submit">
        <i class="main-color fas fa-user"></i>
      </button>
      <button style="border-color: #62A4C0;" class="nbtis navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="main-color fas fa-bars"></i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      {{-- Main Links --}}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('proyects')}}">
            <span class="nav-link-text">
              Proyectos
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Subsidios Habitacionales
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Por qué invertir
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Financiamiento
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span class="nav-link-text">
              Respaldo
            </span>
          </a>
        </li>
      </ul>
      {{-- Login BTNS --}}
      <form class="form-inline my-2 my-lg-0">
        <button class="nbnlg-btn btn btn-success navBar-btn bg-main-color text-light">Vende con nosotros</button>
        <button class="nbnlg-btn btn navBar-btn navBar-btn-outline main-color" type="button" data-toggle="modal" data-target="#loginModal">
          <span>Iniciar sesión</span>
          <i class="fas fa-user navBar-btn-icon"></i>
        </button>
      </form>
    </div>
  </div>
</nav>

{{-- Login Modal --}}
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row login-modal-container">
          {{-- Left Panel --}}
          <div class="col-md-6">
            <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
              {{-- Tabs --}}
              <li class="nav-item mr-3" role="presentation">
                <a class="login-modal-tab active" id="pills-home-tab" data-toggle="pill" href="#login" role="tab" aria-controls="pills-home" aria-selected="true">Ingresar</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="login-modal-tab" id="pills-profile-tab" data-toggle="pill" href="#register" role="tab" aria-controls="pills-profile" aria-selected="false">Registrarse</a>
              </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              {{-- Login Content --}}
              <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="pills-profile-tab">
                <form>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="pw" placeholder="Contraseña">
                  </div>
                  <div class="form-group mt-4">
                    <div class="form-check form-check-inline">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label login-modal-fp" for="exampleCheck1">Recordar</label>
                    </div>
                    <div class="form-check form-check-inline float-right">
                      <a class="login-modal-link" href="#">Olvidaste la contraseña?</a>
                    </div>
                  </div>

                  <button type="submit" class="btn bg-main-color general-btn ">Ingresar</button>
                </form>
                <div class="mt-4">
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
                </div>
              </div>

              {{-- Register Content --}}
              <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="pills-contact-tab">
                <form>
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nombre">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="regEmail" aria-describedby="emailHelp" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="regpw" placeholder="Contraseña">
                  </div>

                  <button type="submit" class="btn bg-main-color general-btn mt-2">Registrarse</button>
                </form>
                <div class="mt-4">
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
                </div>
              </div>

            </div>
          </div>
          {{-- Right Panel --}}
          <div class="col-md-6">
            <img src="./assets/images/login-modal-img.png" width="100%">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
