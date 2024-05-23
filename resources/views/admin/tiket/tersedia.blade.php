<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiket Tersedia | Orland</title>
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
                <h2>Data Tiket Tersedia</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">id_tiket</th>
                                <th scope="col">nama_event</th>
                                <th scope="col">nama_tiket</th>
                                <th scope="col">deskripsi_tiket</th>
                                <th scope="col">harga_tiket</th>
                                <th scope="col">stock_tiket</th>
                                <th scope="col">batas_waktu</th>
                                <th scope="col">status_tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_tiket as $tiket)
                                <tr>
                                    <td>{{ $tiket->id_tiket }}</td>
                                    <td>{{ $tiket->event->nama_event }}</td>
                                    <td>{{ $tiket->nama_tiket }}</td>
                                    <td>{{ $tiket->deskripsi_tiket }}</td>
                                    <td>{{ $tiket->harga_tiket }}</td>
                                    <td>{{ $tiket->stock_tiket }}</td>
                                    <td>{{ $tiket->batas_waktu }}
                                    </td>
                                    <td>{{ $tiket->status_tiket }}</td>
                                    <td><a href="{{ route('admin_tiket.edit', $tiket->id_tiket) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>{{ $data_tiket->links() }}</p>
                </div>
            </main>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
