<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Tiket</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    @php
        use Carbon\Carbon;
        $formattedDatetime = Carbon::createFromFormat('Y-m-d H:i:s', $tiket->batas_waktu)->format('Y-m-d\TH:i');
    @endphp
    <div class="container-fluid position-relative px-5">
        <div class="container px-4 py-2">
            <div class="row justify-content-center">
                <main class="col-md-12 ms-sm-auto col-lg-12 px-md-12">
                    <h1 class="h2 text-center py-2">Edit Tiket</h1>
                    <form action="{{ route('creator_tiket.update', $tiket->id_tiket) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_event" value="{{ $tiket->id_event }}">
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputText">Nama Tiket</label>
                                <input type="text" class="form-control" name="nama_tiket" id="inputText"
                                    placeholder="Isi Nama Tiket" value="{{ $tiket->nama_tiket }}">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputTextarea">Deskripsi Tiket</label>
                                <textarea class="form-control" name="deskripsi_tiket" id="inputTextarea" rows="3"
                                    placeholder="Isi Deskripsi Tiket">{{ $tiket->deskripsi_tiket }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label>Harga Tiket</label>
                                <input type="text" class="form-control" id="numberInput" placeholder="Harga Tiket"
                                    value="{{ $tiket->harga_tiket }}">
                                <input type="hidden" name="harga_tiket" id="targetInput"
                                    value="{{ $tiket->harga_tiket }}">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label>Stock Tiket</label>
                                <input type="number" class="form-control" name="stock_tiket" id="numberInput"
                                    placeholder="Stock Tiket" value="{{ $tiket->stock_tiket }}">
                            </div>
                        </div>
                        <div class="col-md-12 py-2">
                            <div class="form-group">
                                <label for="inputDateTime">Batas Waktu Pembelian</label>
                                <input type="datetime-local" class="form-control" name="batas_waktu" id="inputDateTime"
                                    value="{{ $formattedDatetime }}">
                            </div>
                        </div>
                        <input type="hidden" name="status_tiket" value="1">
                        <button type="submit" class="btn btn-primary my-2 py-2 px-5">Kirim</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
    @include('footer')
    @include('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script>
        var input = document.getElementById('numberInput');

        // Inisialisasi format ribuan menggunakan numeral.js
        numeral.defaultFormat('0,0');
        numeral(input.value).format();

        // Event listener untuk memformat input saat nilai berubah
        input.addEventListener('input', function() {
            var value = this.value.replace(/,/g, ''); // Menghapus tanda koma
            this.value = numeral(value).format(); // Memformat input dengan tanda ribuan
        });
    </script>
    <script>
        var sourceInput = document.getElementById('numberInput');
        var targetInput = document.getElementById('targetInput');

        // Event listener untuk memproses input saat nilai berubah
        sourceInput.addEventListener('input', function() {
            var value = this.value.replace(/,/g, ''); // Menghapus tanda koma
            targetInput.value = value; // Menetapkan nilai input target
        });
    </script>
</body>

</html>
