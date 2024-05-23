<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Event Buatan Anda | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h1 class="display-4 text-uppercase">Event Anda</h1>
            </div>
            <div class="tab-class text-center">
                <div class="container">
                    <div class="row">
                        @foreach ($data_event as $event)
                            @php
                                if (strlen($event->deskripsi_event) > 56) {
                                    $deskripsi_event = substr($event->deskripsi_event, 0, 56 - 3) . '...';
                                } else {
                                    $deskripsi_event = $event->deskripsi_event;
                                }
                            @endphp
                            <div class="col-md-3">
                                <div class="card mb-4">
                                    <a href="{{ route('event.detail', $event->id_event) }}"><img class="card-img-top"
                                            src="{{ asset('banner_event/' . $event->banner_event) }}" alt="Image"
                                            style="max-height: 143px; object-fit: cover;"></a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $event->nama_event }}</h5>
                                        <p class="card-text">{{ $deskripsi_event }}</p>
                                        <p class="card-text"><strong>{{ $event->waktu_event }}</strong></p>
                                        <a href="{{ route('creator_tiket.create.id', $event->id_event) }}"
                                            class="btn btn-primary my-1">Tambahkan Tiket</a>
                                        <a href="{{ route('creator.edit.event', $event->id_event) }}"
                                            class="btn btn-primary my-1">Edit Detail Event</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container" style="justify-content: center; display: flex;">
                    <a href="{{ route('creator.create.event') }}" class="btn btn-primary border-inner py-3 px-4">Buat
                        Event
                        Baru</a>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
