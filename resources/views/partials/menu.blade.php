<nav class="navbar navbar-expand-lg navbar-dark shadow-sm clinic-navbar">
  <div class="container-fluid">
    @auth
    <a class="navbar-brand text-white px-3 fw-bold" href="{{ route('home') }}">
      <i class="bi bi-house-door-fill me-2"></i>Mascotes Clinic
    </a>
    @else
    <a class="navbar-brand text-white px-3 fw-bold" href="{{ route('welcome') }}">
      <i class="bi bi-house-door-fill me-2"></i>Mascotes Clinic
    </a>
    @endauth

    <button class="navbar-toggler border border-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">

      @auth
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-people-fill me-1"></i>Propietaris
          </a>
          <ul class="dropdown-menu border-0 shadow clinic-dropdown">
            <li>
              <a class="dropdown-item" href="{{ route('owner.list') }}">
                <i class="bi bi-list-ul me-2"></i>Llistar tots
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('owner.search') }}">
                <i class="bi bi-search me-2"></i>Buscar mascotes
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('owner.modify') }}">
                <i class="bi bi-pencil-square me-2"></i>Modificar
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown px-3">
          <a class="nav-link dropdown-toggle text-white fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-heart-fill me-1"></i>Mascotes
          </a>
          <ul class="dropdown-menu border-0 shadow clinic-dropdown">
            <li>
              <a class="dropdown-item" href="{{ route('pet.list') }}">
                <i class="bi bi-list-ul me-2"></i>Llistar totes
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('pet.search') }}">
                <i class="bi bi-search me-2"></i>Buscar
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item" href="{{ route('pet.history') }}">
                <i class="bi bi-journal-plus me-2"></i>Afegir historial
              </a>
            </li>
          </ul>
        </li>



      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item px-3">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-clinic-secondary fw-semibold text-white">
              <i class="bi bi-box-arrow-right me-2"></i>Logout
            </button>
          </form>
        </li>
      </ul>

      @else
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item px-3">
          <a href="{{ route('login') }}" class="btn btn-clinic-secondary fw-semibold text-white">
            <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sessió
          </a>
        </li>
        <li class="nav-item px-3">
          <a href="{{ route('register') }}" class="btn btn-clinic-search fw-semibold text-white">
            <i class="bi bi-person-plus me-2"></i>Registrar-se
          </a>
        </li>
      </ul>

      @endauth

    </div>
  </div>
</nav>
