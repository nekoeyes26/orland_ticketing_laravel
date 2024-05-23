<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')

    <!-- Contact Start -->
    <div class="container-fluid position-relative px-5" style="margin-top: 5%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title text-center" style="padding-top: 2%; padding-bottom: 5%;">REGISTER
                            </h1>
                            <form action="{{ route('admin.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control bg-light px-4" placeholder="Your Name"
                                            style="height: 55px;" name="nama">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control bg-light px-4"
                                            placeholder="Your Email" style="height: 55px;" value="{{ old('email') }}"
                                            id="email" name="email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control bg-light px-4" placeholder="Password"
                                            style="height: 55px;" name="password" id="password">
                                    </div>
                                    <input type="hidden" name="role" value="1">
                                    <div class="col-sm-12">
                                        <button class="btn btn-primary border-inner w-100 py-3" type="submit">Sign
                                            Up</button>
                                    </div>
                                    <div class="form-group text-center col-sm-12">
                                        <p class="mb-0">Sudah punya akun? <a href="#">Sign In</a></p>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    @include('footer')
    @include('script')
</body>

</html>
