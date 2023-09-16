<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page (v2)</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/dist/css/adminlte.min.css?v=3.2.0') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        @include('includes.errors')
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Alfa</b>SOFT</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new user</p>
                <form action="{{ route('auth.register') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" required name="name" class="form-control" placeholder="Full name" value="{{ old('name') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" required name="email" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" required name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" required name="password_confirmation" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>

                    </div>
                </form>
                <a href="{{ route('login') }}" class="text-center">I already have a credentials</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('/AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/AdminLTE-master/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
</body>

</html>