<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pembayaran Tiket | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @php
        if (session()->get('jumlah_tiket') > $tiket->stock_tiket) {
            session(['jumlah_tiket' => $tiket->stock_tiket]);
        }
    @endphp
    @include('navbar')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout</h2>
                <p class="lead">Lengkapi detail berikut untuk melakukan pembayaran</p>
            </div>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Tiket Yang Akan Dibeli</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @for ($i = 0; $i < session()->get('jumlah_tiket'); $i++)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">{{ $event->nama_event }}</h6>
                                    <small class="text-body-secondary">{{ $tiket->nama_tiket }}</small>
                                </div>
                                <span
                                    class="text-body-secondary">Rp.{{ number_format($tiket->harga_tiket, 0, ',', '.') }}</span>
                            </li>
                        @endfor
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total: {{ session()->get('jumlah_tiket') }}</span>
                            <strong>Rp.{{ number_format($tiket->harga_tiket * session()->get('jumlah_tiket'), 0, ',', '.') }}</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate method="POST" action="{{ route('pembelian.store') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" placeholder=""
                                    value="{{ $data_user->nama }}" required>
                                <div class="invalid-feedback"> Valid first name is required. </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="" value=""
                                    required>
                                <div class="invalid-feedback"> Valid last name is required. </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" placeholder=""
                                    value="{{ $data_user->nomor_ponsel }}">
                                <div class="invalid-feedback"> Please enter a valid phone number for shipping updates.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="country" class="form-label">Metode Pembayaran</label>
                                <select class="form-select" id="country" required>
                                    <option value="">Choose...</option>
                                    <option>Gopay</option>
                                    <option>Dana</option>
                                    <option>Shopeepay</option>
                                </select>
                                <div class="invalid-feedback"> Please select a valid payment method. </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <input type="hidden" name="id_event" value="{{ $event->id_event }}">
                        <input type="hidden" name="id_tiket" value="{{ $tiket->id_tiket }}">
                        <input type="hidden" name="email" value="{{ $data_user->email }}">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
