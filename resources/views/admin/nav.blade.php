<nav id="sidebarMenu" class="col-md-1 col-lg-1 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-0 mb-1 text-body-secondary text-uppercase">
            <span>Data Event</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin_event.index') }}">
                    <span class="align-text-bottom"></span> Semua Event </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_event.belumAdaTiket') }}">
                    <span class="align-text-bottom"></span> Event Belum ada Tiket </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_event.tersedia') }}">
                    <span class="align-text-bottom"></span> Event tersedia </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_event.lampau') }}">
                    <span class="align-text-bottom"></span> Event lampau </a>
            </li>
        </ul>
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Data Tiket</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_tiket.index') }}">
                    <span class="align-text-bottom"></span> Semua Tiket
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_tiket.tersedia') }}">
                    <span class="align-text-bottom"></span> Tiket tersedia </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_tiket.tidakTersedia') }}">
                    <span class="align-text-bottom"></span> Tiket tidak tersedia
                </a>
            </li>
        </ul>
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Data User</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_user.user') }}">
                    <span class="align-text-bottom"></span> Semua User
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_user.creator') }}">
                    <span class="align-text-bottom"></span> Creator </a>
            </li>
        </ul>
    </div>
</nav>
