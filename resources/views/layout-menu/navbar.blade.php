{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">KingRestoBDG</a>
    <li class="nav-item dropdown mx-5"  style="list-style: none">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ auth()->user()->name }}
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#"><form action="/logout" method="POST">
          @csrf
        <button class="btn btn-dark" type="submit">Log Out</button> </a>
      </form></li>
      </ul>
    </li>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
      
    </div>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/" style="color: black">KingRestoBDG</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @can('admin')
    <a class="navbar-brand" href="dashboard " style="color: black">Dashboard</a>
    @endcan
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color: black" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="/myprofile">My Profile</a></li>
            <li><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Pesanan<span class="badge bg-secondary">
                @if ($pesananku != null)
        {{ count($pesananku) }}
        @else
        {{ 0 }}
        @endif
              </span>
            </button></li>
            <li> <form action="/logout" method="POST">
              @csrf
            <button class="btn btn-dark" type="submit">Log Out</button> </a>
          </form></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>