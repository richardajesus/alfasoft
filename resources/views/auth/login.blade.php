<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/plugins/fontawesome-free/css/all.min.css' )}}">

    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css' )}}">

    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/dist/css/adminlte.min.css?v=3.2.0' )}}">
</head>
@auth
<script>
    window.location = "{{ url('/') }}";
</script>
@endauth

<body class="hold-transition login-page">
    <div class="login-box">
        @include('includes.errors')
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Alfa</b>SOFT</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="E-mail">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="{{ route('auth.register') }}" class="text-center">Register a new user</a>
                </p>
            </div>
        </div>
    </div>
    <script src="{{ asset('/AdminLTE-master/plugins/jquery/jquery.min.js' )}}"></script>
    <script src="{{ asset('/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>
    <script src="{{ asset('/AdminLTE-master/dist/js/adminlte.min.js?v=3.2.0' )}}"></script>
</body>

</html>