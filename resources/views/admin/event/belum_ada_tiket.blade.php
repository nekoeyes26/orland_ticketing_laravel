<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Event Tidak Ada Tiket | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    <div class="container-fluid">
        <div class="row">
            @include('admin.nav')
            <main class="col-md-11 ms-sm-auto col-lg-11 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                <h2>Data Event yang belum memiliki tiket</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">nama</th>
                                <th scope="col">format</th>
                                <th scope="col">topik</th>
                                <th scope="col">kategori</th>
                                <th scope="col">waktu</th>
                                <th scope="col">lokasi</th>
                                <th scope="col">deskripsi</th>
                                <th scope="col">banner</th>
                                <th scope="col">status</th>
                                <th scope="col">email</th>
                                <th scope="col">edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_event as $event)
                                <tr>
                                    <td>{{ $event->id_event }}</td>
                                    <td>{{ $event->nama_event }}</td>
                                    <td>{{ $event->format_event->nama_format_event }}</td>
                                    <td>{{ $event->topik_event->nama_topik_event }}</td>
                                    <td>{{ $event->kategori_event->nama_kategori_event }}</td>
                                    <td>{{ $event->waktu_event }}</td>
                                    <td>{{ $event->lokasi_provinsi_event . ', ' . $event->lokasi_kota_event . ', ' . $event->lokasi_detail_event }}
                                    </td>
                                    <td>{{ $event->deskripsi_event }}</td>
                                    <td>{{ $event->banner_event }}</td>
                                    <td>{{ $event->status_event }}</td>
                                    <td>{{ $event->email }}</td>
                                    <td><a href="{{ route('admin_event.edit', $event->id_event) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>{{ $data_event->links() }}</p>
                </div>
            </main>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
