<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jadi Kreator | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    @php
        use App\Models\Creator;
        if (Creator::where('email', '=', Auth::user()->email)->first()) {
            $creator = Creator::where('email', '=', Auth::user()->email)->first();
        } else {
            $creator = null;
        }
    @endphp
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
                    <h1 class="h2">Jadi Kreator</h1>
                </div>
                <form method="POST" action="{{ route('creator.store') }}">
                    @csrf
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="inputText">Email</label>
                            <input type="text" class="form-control" id="inputText" placeholder="Enter text"
                                value="{{ $data_akun->email }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="inputText">Nama Organizer</label>
                            @if ($creator)
                                <input type="text" class="form-control" id="inputText"
                                    value="{{ $creator->nama_organizer }}" name="nama_organizer">
                            @else
                                <input type="text" class="form-control" id="inputText" value="{{ $data_akun->nama }}"
                                    name="nama_organizer">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="inputText">Alamat</label>
                            @if ($creator)
                                <input type="text" class="form-control" id="inputText" value="{{ $creator->alamat }}"
                                    name="alamat">
                            @else
                                <input type="text" class="form-control" id="inputText" value="" name="alamat">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="inputText">Nomor Ponsel</label>
                            @if ($creator)
                                <input type="text" class="form-control" id="inputText"
                                    value="{{ $creator->nomor_ponsel }}" name="nomor_ponsel">
                            @else
                                <input type="text" class="form-control" id="inputText"
                                    value="{{ $data_akun->nomor_ponsel }}" name="nomor_ponsel">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="inputText">Tentang Organizer Anda</label>
                            @if ($creator)
                                <input type="text" class="form-control" id="inputText"
                                    value="{{ $creator->tentang }}" name="tentang">
                            @else
                                <input type="text" class="form-control" id="inputText" value="" name="tentang">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="form-group">
                            <label for="inputText">Nomor KTP</label>
                            @if ($creator)
                                <input type="text" class="form-control" id="inputText"
                                    value="{{ $creator->nomor_ktp }}" name="nomor_ktp">
                            @else
                                <input type="text" class="form-control" id="inputText" value=""
                                    name="nomor_ktp">
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary my-2 py-2 px-5">Simpan</button>
                </form>
            </main>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
