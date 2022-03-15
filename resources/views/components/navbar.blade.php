

<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Buntok Delivery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Data Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('mitra.index') }}">Data Mitra</a>
            </li>
          </ul>
          @auth
          <div class="d-flex user-logged nav-item dropdown no-arrow ms-auto p-2 bd-highlight">
            {{-- <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form> --}}

            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, Admin
                <img src="https://ui-avatars.com/api/?name=Admin" class="user-photo rounded-circle" alt="">
               
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="right: 0; left: auto">
                    <li>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Sign Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </li>
                </ul>
            </a>
        </div>
          @endauth
        </div>
      </div>
    </nav>
  

