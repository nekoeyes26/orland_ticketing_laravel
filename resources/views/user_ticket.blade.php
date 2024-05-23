<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiket Anda | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h1 class="display-4 text-uppercase">Tiket Anda</h1>
            </div>
            <div class="tab-class text-center">
                <ul
                    class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                    <li class="nav-item">
                        <a class="nav-link text-white active" data-bs-toggle="pill" href="#tab-1">Mendatang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-2">Terpakai</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-3">
                            @foreach ($tiket_user as $tiket)
                                @if ($tiket->status == 1)
                                    <div class="col-lg-6">
                                        <div class="d-flex h-100">
                                            <div class="flex-shrink-0">
                                                <img class="img-fluid"
                                                    src="{{ asset('banner_event/' . $tiket->tiket->event->banner_event) }}"
                                                    alt="" style="max-width: 277px; height: 130px;">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4"
                                                style="width: 100%;">
                                                <h5 class="text-uppercase">{{ $tiket->tiket->event->nama_event }}</h5>
                                                <h6 class="text-uppercase">{{ $tiket->tiket->event->waktu_event }}</h6>
                                                <div class="row">
                                                    <div style="max-width: 50%">
                                                        <span>{{ $tiket->tiket->nama_tiket }}</span>
                                                        <p>Jumlah Tiket: {{ $tiket->kuantitas }}</p>
                                                    </div>
                                                    <div
                                                        style="max-width: 50%; display: flex; justify-content: space-between; align-items: center;">
                                                        <form action="{{ route('user.tiket.update', $tiket->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary"> Pakai
                                                                Tiket </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-3">
                            @foreach ($tiket_user as $tiket)
                                @if ($tiket->status == 0)
                                    <div class="col-lg-6">
                                        <div class="d-flex h-100">
                                            <div class="flex-shrink-0">
                                                <img class="img-fluid"
                                                    src="{{ asset('banner_event/' . $tiket->tiket->event->banner_event) }}"
                                                    alt="" style="max-width: 277px; height: 130px;">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center text-start bg-secondary border-inner px-4"
                                                style="width: 100%;">
                                                <h5 class="text-uppercase">{{ $tiket->tiket->event->nama_event }}</h5>
                                                <h6 class="text-uppercase">{{ $tiket->tiket->event->waktu_event }}</h6>
                                                <span>{{ $tiket->tiket->nama_tiket }}</span>
                                                <p>Jumlah Tiket: {{ $tiket->kuantitas }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
