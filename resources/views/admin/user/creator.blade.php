<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>List Creator | Orland</title>
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
                <h2>Data Creator</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">email</th>
                                <th scope="col">nama_organizer</th>
                                <th scope="col">alamat</th>
                                <th scope="col">nomor_ponsel</th>
                                <th scope="col">tentang</th>
                                <th scope="col">nomor_ktp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_creator as $creator)
                                <tr>
                                    <td>{{ $creator->email }}</td>
                                    <td>{{ $creator->nama_organizer }}</td>
                                    <td>{{ $creator->alamat }}</td>
                                    <td>{{ $creator->nomor_ponsel }}</td>
                                    <td>{{ $creator->tentang }}</td>
                                    <td>{{ $creator->nomor_ktp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>{{ $data_creator->links() }}</p>
                </div>
            </main>
        </div>
    </div>
    @include('footer')
    @include('script')
</body>

</html>
