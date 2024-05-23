<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-3">
                    <div class="d-inline-flex">
                        <div class="d-flex">
                            <a href="{{ route('home') }}"><img src="{{ asset('img/logo_orland.png') }}" alt="Image"
                                    style="max-height: 44px;"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9">
                    <div class="d-flex">
                        <form class="d-flex my-3" style="width: 40%; max-height: 55px;"
                            action="{{ route('event.search') }}" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Cari event seru disini"
                                aria-label="Search" name="keyword">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse" style="flex-grow: 0.5;">
                            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                                <a href="{{ route('home') }}" class="nav-item nav-link active">Home</a>
                                <a href="{{ route('jelajah') }}" class="nav-item nav-link">Jelajah</a>
                                <a href="{{ route('home') }}" class="nav-item nav-link">Terpopuler</a>
                                <a href="{{ route('home') }}" class="nav-item nav-link">Terbaru</a>
                                @if (Auth::user())
                                    @if (Auth::user()->status_creator == 1)
                                        <a href="{{ route('creator_event.index') }}" class="nav-item nav-link">Event
                                            Anda</a>
                                    @endif
                                @endif
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">Akun</a>
                                    <div class="dropdown-menu m-0">
                                        @if (Auth::user())
                                            <a href="/detail_akun" class="dropdown-item">Detail Akun</a>
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button class="dropdown-item">Logout</button>
                                            </form>
                                        @else
                                            <a href="/login" class="dropdown-item">Masuk</a>
                                            <a href="/register" class="dropdown-item">Daftar</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
