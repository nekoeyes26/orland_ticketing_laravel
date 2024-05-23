<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Riwayat Pembelian | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-2 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
                <h6
                    class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Akun</span>
                </h6>
                <div class="position-sticky sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('user.account') }}">
                                <span data-feather="home" class="align-text-bottom"></span> Informasi Dasar </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file" class="align-text-bottom"></span> Kata Sandi </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.pembelian') }}">
                                <span data-feather="file" class="align-text-bottom"></span> Riwayat Pemesanan </a>
                        </li>
                    </ul>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                        <span>Mode User</span>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('creator.register') }}">
                                <span data-feather="file-text" class="align-text-bottom"></span> Beralih ke Event
                                Creator </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <h2>Riwayat Pemesanan</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Nama Event</th>
                                <th scope="col">Jenis Tiket</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayat_user as $riwayat)
                                <tr>
                                    <td>{{ $riwayat->event->nama_event }}</td>
                                    <td>{{ $riwayat->tiket->nama_tiket }}</td>
                                    <td>{{ $riwayat->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
