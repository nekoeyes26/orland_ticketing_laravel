<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Event</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <!-- Main content -->
    <main>
        <div class="container" style="margin-top: 2%;">
            <div class="row">
                <div class="col-md-7" style="display: flex; justify-content: center;">
                    <img src="{{ asset('banner_event/' . $event->banner_event) }}" alt="Image"
                        style="height: 338px; width: 93%; object-fit: cover;">
                </div>
                <div class="col-md-5 ">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title py-3">{{ $event->nama_event }}</h5>
                            <p class="card-text"> {{ $event->deskripsi_event }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 2%;">
            <div class="row">
                <div class="col-md-7 px-5">
                    <h3>Ticket</h3>
                    <div class="ticket-detail">
                        @foreach ($data_tiket as $tiket)
                            @if ($tiket->status_tiket == 1)
                                <div class="ticket-item ">
                                    <div class="ticket-item-top">
                                        <div class="ticket-name">{{ $tiket->nama_tiket }}
                                        </div>
                                        <div class="ticket-description"> {{ $tiket->deskripsi_tiket }} </div>
                                        <div class="ticket-description-expand uk-hidden">
                                            <i class="icon icon-chevron-right down"></i>
                                        </div>
                                        <div class="ticket-schedule ">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="uk-preserve uk-svg"
                                                data-svg="/web/assets/img/ic-clock-filled.svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1 8C1 4.13386 4.13386 1 8 1C11.8661 1 15 4.13386 15 8C15 11.8661 11.8661 15 8 15C4.13386 15 1 11.8661 1 8ZM10.4051 9.38363L8.72414 7.92793V4.62069C8.72414 4.22076 8.39993 3.89655 8 3.89655C7.60007 3.89655 7.27586 4.22076 7.27586 4.62069V8.25876C7.27586 8.46887 7.36712 8.66862 7.52595 8.80616L9.45698 10.4784C9.75931 10.7402 10.2166 10.7074 10.4784 10.4051C10.7402 10.1028 10.7074 9.64544 10.4051 9.38363Z"
                                                    fill="#ADB6C9"></path>
                                            </svg>
                                            <p> Berakhir <span
                                                    class="end-sale">{{ date('Y-m-d', strtotime($tiket->batas_waktu)) }}
                                                    <span class="separator"></span>
                                                    {{ date('H:i', strtotime($tiket->batas_waktu)) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ticket-item-bottom">
                                        <div class="ticket-price">
                                            <div class="ticket-price-main formated-price">
                                                <b>Rp {{ number_format($tiket->harga_tiket, 0, ',', '.') }}</b>
                                            </div>
                                        </div>
                                        <div class="ticket-controller enterprise d-flex">
                                            <label class="px-3">Quantity:</label>
                                            <button
                                                onclick="var result = document.getElementById('sst{{ $tiket->id_tiket }}'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                class="btn btn-danger" type="button">-</button>
                                            <form
                                                action="{{ route('event.billing', ['id_event' => $event->id_event, 'id_tiket' => $tiket->id_tiket]) }}">
                                                <input type="number" name="jumlah" id="sst{{ $tiket->id_tiket }}"
                                                    value="1" min="1" max="{{ $tiket->stock_tiket }}"
                                                    title="Quantity:" style="width: 32px; height: 37px;">
                                                <button
                                                    onclick="var result = document.getElementById('sst{{ $tiket->id_tiket }}'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                    class="btn btn-success" type="button">+</button>
                                        </div>
                                    </div>
                                    <div
                                        style="position: relative; padding: 16px 0 0; display: flex; justify-content: space-between; align-items: center;">
                                        <div class="ticket-price">
                                            <div class="ticket-price-main formated-price"><b></b></div>
                                        </div>
                                        <div class="ticket-controller enterprise">
                                            @if (Auth::user())
                                                @if (Auth::user()->email == $event->email)
                                                    <a href="{{ route('creator_tiket.edit', $tiket->id_tiket) }}"
                                                        class="btn btn-warning btn-sm">Edit Tiket</a>
                                                @endif
                                            @endif
                                            <button type="submit" class="btn btn-primary px-5 py-1"> Beli
                                                Tiket </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="ticket-item disabled">
                                    <div class="ticket-item-top">
                                        <div id="ticket-name-240200" class="ticket-name"> {{ $tiket->nama_tiket }}
                                        </div>
                                        <div class="ticket-description"> {{ $tiket->deskripsi_tiket }}
                                        </div>
                                        <div class="ticket-description-expand uk-hidden">
                                            <i class="icon icon-chevron-right down"></i>
                                        </div>
                                        <div class="ticket-schedule event-schedule-expired">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="uk-preserve uk-svg"
                                                data-svg="/web/assets/img/ic-clock-filled.svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M1 8C1 4.13386 4.13386 1 8 1C11.8661 1 15 4.13386 15 8C15 11.8661 11.8661 15 8 15C4.13386 15 1 11.8661 1 8ZM10.4051 9.38363L8.72414 7.92793V4.62069C8.72414 4.22076 8.39993 3.89655 8 3.89655C7.60007 3.89655 7.27586 4.22076 7.27586 4.62069V8.25876C7.27586 8.46887 7.36712 8.66862 7.52595 8.80616L9.45698 10.4784C9.75931 10.7402 10.2166 10.7074 10.4784 10.4051C10.7402 10.1028 10.7074 9.64544 10.4051 9.38363Z"
                                                    fill="#ADB6C9"></path>
                                            </svg>
                                            <p> Berakhir <span
                                                    class="end-sale">{{ date('Y-m-d', strtotime($tiket->batas_waktu)) }}<span
                                                        class="separator"></span>
                                                    {{ date('H:i', strtotime($tiket->batas_waktu)) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ticket-item-bottom">
                                        <div class="ticket-price">
                                            <div class="ticket-price-main formated-price">
                                                <b>Rp {{ number_format($tiket->harga_tiket, 0, ',', '.') }}</b>
                                            </div>
                                        </div>
                                        <div class="ticket-status">
                                            <p class="expired">MASA PEMBELIAN TELAH BERAKHIR</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="card mb-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title py-3">
                                    {{ $event->lokasi_detail_event }}</h5>
                                <p class="card-text"> {{ date('Y-m-d', strtotime($event->waktu_event)) }}
                                    <br>{{ date('H:i', strtotime($event->waktu_event)) }}<br>
                                    {{ $event->lokasi_kota_event }} <br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('footer')
    @include('script')
</body>

</html>
