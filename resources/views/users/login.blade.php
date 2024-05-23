<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login | Orland</title>
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    @if (Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    @if (Session::has('gagal_login'))
        <div class="alert alert-danger">
            {{ session('gagal_login') }}
        </div>
    @endif
    <!-- Main content -->
    <main>
        <div class="container-fluid position-relative px-5" style="margin-top: 2%;">
            <div class="row">
                <div class="col-md-6" style="display: flex; align-items: center; justify-content: center;">
                    <img src="img/login.jpg" alt="Image" style="max-width: 100%;">
                </div>
                <div class="col-md-6">
                    <div class="login-container">
                        <div class="login-form">
                            <div class="card" style="max-width: 460px;">
                                <div class="card-body" style="min-height: 460px;">
                                    <h3 class="card-title text-center" style="padding-bottom: 10%; padding-top: 5%;">
                                        LOGIN</h3>
                                    <form action="/login" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-sm-12">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Email" name="email" value="{{ old('email') }}"
                                                    required>
                                            </div>
                                            <div class="col-sm-12">
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Password" name="password" required>
                                            </div>
                                            <div class="form-group text-center col-sm-12">
                                                <p class="mb-0">Belum punya akun? <a href="/register">Sign Up</a></p>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Sign In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
