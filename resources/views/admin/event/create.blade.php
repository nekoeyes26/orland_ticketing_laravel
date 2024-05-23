<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Buat Event</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @php
        $user = Auth::user();
        $email = $user->email;
    @endphp
    @include('navbar')
    <div class="container-fluid position-relative px-5">
        <div class="container px-4 py-2">
            <div class="row justify-content-center">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                    <h1 class="h2 text-center py-2">Buat Event</h1>
                    <form action="{{ route('admin_event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputText">Nama Event</label>
                                <input type="text" class="form-control" name="nama_event" id="inputText"
                                    placeholder="Isi Nama Event">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputTextarea">Deskripsi Event</label>
                                <textarea class="form-control" name="deskripsi_event" id="inputTextarea" rows="3"
                                    placeholder="Isi Deskripsi Event"></textarea>
                            </div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dropdown1">Format Event</label>
                                    <select class="form-select" name="id_format_event" id="dropdown1">
                                        <option selected>Select option</option>
                                        @foreach ($format_event as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dropdown2">Topik Event</label>
                                    <select class="form-select" name="id_topik_event" id="dropdown2">
                                        <option selected>Select option</option>
                                        @foreach ($topik_event as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="dropdown3">Kategori Event</label>
                                    <select class="form-select" name="id_kategori_event" id="dropdown3">
                                        <option selected>Select option</option>
                                        @foreach ($kategori_event as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row py-2">
                            <label for="">Lokasi Event</label>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-select" id="provinceDropdown" name='lokasi_provinsi_event'
                                        required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Kota / Kabupaten</label>
                                <div class="form-group">
                                    <select class="form-select" id="cityDropdown" name="lokasi_kota_event" required>
                                        <option value="">Pilih Kota/Kabupaten</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputLocation">Detail Lokasi Event</label>
                                <input type="text" class="form-control" name="lokasi_detail_event" id="inputLocation"
                                    placeholder="Isi Detail Lokasi Event">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputDateTime">Waktu Event Akan Berlangsung</label>
                                <input type="datetime-local" class="form-control" name="waktu_event" id="inputDateTime">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputImage">Banner Event (disarankan 800x376 (width x height))</label>
                                <input type="file" class="form-control" name="banner_event" id="inputImage">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputText">Email Penyelenggara</label>
                                <input type="text" class="form-control" name="email" id="inputText"
                                    placeholder="Isi Nama Event" value="{{ $email }}" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="status_event" value="0">
                        <p class=" pt-3">Klik Lanjutkan untuk membuat tiket</p>
                        <button type="submit" class="btn btn-primary py-2 px-5">Lanjutkan..</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
    @include('footer')
    @include('script')
    <script>
        $("#provinceDropdown").change(function() {
            var selectedVariant = $(this).children("option:selected").val();
            var selectedProvince = $(this).children("option:selected").text();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "{{ route('api.rajaongkir.getcity') }}",
                data: {
                    province: selectedVariant
                },
                success: function(msg) {
                    $("select#cityDropdown").html(msg);
                }
            });
        });
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                dataType: "html",
                url: "{{ route('api.rajaongkir.getprovince') }}",
                success: function(msg) {
                    $("select#provinceDropdown").html(msg);
                }
            });
        });
    </script>
</body>

</html>
