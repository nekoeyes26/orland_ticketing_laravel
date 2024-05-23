<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Jelajah | Orland</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @php
        use App\Models\Tiket;
        $cards = [];
        foreach ($data_event as $index => $result) {
            if (strlen($result->deskripsi_event) > 56) {
                $deskripsi_event = substr($result->deskripsi_event, 0, 56 - 3) . '...';
            } else {
                $deskripsi_event = $result->deskripsi_event;
            }
            $tiket = Tiket::where('id_event', $result->id_event)->first();
            $harga_tiket = number_format($tiket->harga_tiket, 0, ',', '.');
            $cards[] = [
                'cid' => $index,
                'image' => $result->banner_event,
                'title' => $result->nama_event,
                'description' => $deskripsi_event,
                'id_event' => $result->id_event,
                'harga' => $harga_tiket,
                'category' => 'category1',
            ];
        }
    @endphp
    @include('navbar')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">Jelajah</h1>
                <a href="">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Jelajah</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Category selection -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Category Selection</h5>
                        <form id="category-form">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="all-category"
                                        value="all" checked>
                                    <label class="form-check-label" for="all-category"> All </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="category1"
                                        value="category1">
                                    <label class="form-check-label" for="category1"> Category 1 </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="category" id="category2"
                                        value="category2">
                                    <label class="form-check-label" for="category2"> Category 2 </label>
                                </div>
                                <!-- Add more categories here -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Card list -->
                <div class="row" id="card-list">
                    <!-- Cards will be dynamically rendered here -->
                </div>
                <!-- Pagination -->
                <nav aria-label="Card pagination">
                    <ul class="pagination justify-content-center" id="pagination">
                        <!-- Pagination items will be dynamically rendered here -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @include('footer')
    @include('script')
    <script>
        // Sample data for cards
        const cards = @json($cards);
        // for (i = 0; i <= 36; i++) {
        //     cards.push({
        //         "cid": i,
        //         "image": "img/20230418075351.jpg",
        //         "title": "Card Title " + i,
        //         "description": "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        //         "category": "category1"
        //     });
        // }
        // Function to render the cards
        function renderCards(page) {
            const perPage = 9;
            const start = (page - 1) * perPage;
            const end = start + perPage;
            const category = $('input[name="category"]:checked').val();
            // Filter cards based on selected category
            const filteredCards = (category !== "all") ? cards.filter(card => card.category === category) : cards;
            // Get the subset of cards to display
            const pageCards = filteredCards.slice(start, end);
            // Clear existing card list
            $('#card-list').empty();
            // Render cards
            pageCards.forEach(card => {
                const cardElement = `
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img class="card-img-top" src="banner_event/${card.image}" alt="${card.title}" style="max-height: 143px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">${card.title}</h5>
                                <p class="card-text">${card.description}</p>
                                <p class="card-text"><strong>Rp.${card.harga}</strong></p>
                                <a href="{{ route('event.detail', '') }}/${card.id_event}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>
                `;
                $('#card-list').append(cardElement);
            });
            // Render pagination
            renderPagination(filteredCards.length, page);
        }
        // Function to render the pagination
        function renderPagination(totalItems, currentPage) {
            const perPage = 9;
            const totalPages = Math.ceil(totalItems / perPage);
            // Clear existing pagination
            $('#pagination').empty();
            // Render pagination items
            if (totalPages <= 3) {
                for (let i = 1; i <= totalPages; i++) {
                    if (i === currentPage) {
                        $('#pagination').append(`<li class="page-item active"><a class="page-link">${i}</a></li>`);
                    } else {
                        $('#pagination').append(
                            `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`);
                    }
                }
            } else {
                if (currentPage <= 2) {
                    for (let i = 1; i <= 3; i++) {
                        if (i === currentPage) {
                            $('#pagination').append(`<li class="page-item active"><a class="page-link">${i}</a></li>`);
                        } else {
                            $('#pagination').append(
                                `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
                            );
                        }
                    }
                    $('#pagination').append(`<li class="page-item disabled"><a class="page-link">...</a></li>`);
                    $('#pagination').append(
                        `<li class="page-item"><a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a></li>`
                    );
                } else if (currentPage >= totalPages - 1) {
                    $('#pagination').append(
                        `<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`);
                    $('#pagination').append(`<li class="page-item disabled"><a class="page-link">...</a></li>`);
                    for (let i = totalPages - 2; i <= totalPages; i++) {
                        if (i === currentPage) {
                            $('#pagination').append(`<li class="page-item active"><a class="page-link">${i}</a></li>`);
                        } else {
                            $('#pagination').append(
                                `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
                            );
                        }
                    }
                } else {
                    $('#pagination').append(
                        `<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`);
                    $('#pagination').append(`<li class="page-item disabled"><a class="page-link">...</a></li>`);
                    for (let i = currentPage - 1; i <= currentPage + 1; i++) {
                        if (i === currentPage) {
                            $('#pagination').append(`<li class="page-item active"><a class="page-link">${i}</a></li>`);
                        } else {
                            $('#pagination').append(
                                `<li class="page-item"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`
                            );
                        }
                    }
                    $('#pagination').append(`<li class="page-item disabled"><a class="page-link">...</a></li>`);
                    $('#pagination').append(
                        `<li class="page-item"><a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a></li>`
                    );
                }
            }
        }
        // Handle category change
        $('input[name="category"]').change(function() {
            renderCards(1);
        });
        // Handle pagination click
        $(document).on('click', '#pagination a', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            renderCards(page);
        });
        // Initial rendering
        renderCards(1);
    </script>
</body>

</html>
