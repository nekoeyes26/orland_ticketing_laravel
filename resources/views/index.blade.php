<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Orland - Beli Tiket Event dan Jual Eventmu Sendiri</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @php
        use App\Models\Tiket;
    @endphp
    @include('navbar')
    @if (Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5"
        style="background: url({{ asset('img/6274561.jpg') }}) top right no-repeat; background-size: cover;">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="text-primary mb-4">Selamat datang di</h1>
                    <h1 class="display-1 text-uppercase text-white mb-4">ORLAND</h1>
                    <h1 class="text-uppercase text-white">Tempat paling asik cari event musik!</h1>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="" class="btn btn-primary border-inner py-3 px-5 me-5">Info Lengkap</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Testimonial Start -->
    <div class="container-fluid py-1">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-3 pb-3" style="max-width: 600px;">
                <h1 class="display-4 text-uppercase">Yang Lagi Rame nih!</h1>
            </div>
            <div class="owl-carousel">
                @foreach ($event_carousel as $carousel)
                    <div class="p-4" style="height: 376px; width: 93%; object-fit: cover;">
                        <a href="{{ route('event.detail', $carousel->id_event) }}"><img
                                src="{{ asset('banner_event/' . $carousel->banner_event) }}" alt="Image"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- Testimonial End -->
    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h1 class="display-4 text-uppercase">Event Pilihan</h1>
            </div>
            <div class="tab-class text-center">
                <div class="container">
                    <div class="row">
                        @foreach ($event_random as $random)
                            @php
                                if (strlen($random->deskripsi_event) > 56) {
                                    $deskripsi_event = substr($random->deskripsi_event, 0, 56 - 3) . '...';
                                } else {
                                    $deskripsi_event = $random->deskripsi_event;
                                }
                                $tiket = Tiket::where('id_event', $random->id_event)->first();
                            @endphp
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <a href="{{ route('event.detail', $random->id_event) }}"><img class="card-img-top"
                                            src="{{ asset('banner_event/' . $random->banner_event) }}" alt="Image"
                                            style="max-height: 143px; object-fit: cover;"></a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $random->nama_event }}</h5>
                                        <p class="card-text">{{ $deskripsi_event }}
                                        </p>
                                        <p class="card-text">
                                            <strong>Rp. {{ number_format($tiket->harga_tiket, 0, ',', '.') }}</strong>
                                        </p>
                                        <a href="{{ route('event.detail', $random->id_event) }}"
                                            class="btn btn-primary">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <!-- Service Start -->
    <div class="container-fluid service position-relative px-5 mt-5" style="margin-bottom: 135px;">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 col-md-12" style="justify-content: center; display: flex;">
                    <img src="{{ asset('img/1687756003_7Rp8xu.jpg') }}" alt="Image"
                        style="max-height: 205px; width: 100%; object-fit: cover;">
                </div>
                <div class="col-lg-12 col-md-6 text-center">
                    <h1 class="text-uppercase text-light mb-4">30% Discount For This Summer</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Start -->
    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h1 class="display-4 text-uppercase">Event Minggu Ini</h1>
            </div>
            <div class="tab-class text-center">
                <div class="container">
                    <div class="row">
                        @foreach ($event_terdekat as $terdekat)
                            @php
                                if (strlen($terdekat->deskripsi_event) > 56) {
                                    $deskripsi_event = substr($terdekat->deskripsi_event, 0, 56 - 3) . '...';
                                } else {
                                    $deskripsi_event = $terdekat->deskripsi_event;
                                }
                                
                                $tiket = Tiket::where('id_event', $terdekat->id_event)->first();
                            @endphp
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <a href="{{ route('event.detail', $terdekat->id_event) }}"><img
                                            class="card-img-top"
                                            src="{{ asset('banner_event/' . $terdekat->banner_event) }}" alt="Image"
                                            style="max-height: 143px; object-fit: cover;"></a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $terdekat->nama_event }}</h5>
                                        <p class="card-text">{{ $deskripsi_event }}
                                        </p>
                                        <p class="card-text"><strong>Rp.
                                                {{ number_format($tiket->harga_tiket, 0, ',', '.') }}</strong></p>
                                        <a href="{{ route('event.detail', $terdekat->id_event) }}"
                                            class="btn btn-primary">Lihat Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <div class="container" style="justify-content: center; display: flex;">
        <a href="{{ route('jelajah') }}" class="btn btn-primary border-inner p-4">Jelajah ke lebih banyak event</a>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
