<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | General Form Elements</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-master/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/AdminLTE-master//dist/css/adminlte.min.css')}}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('includes.nav')
        @include('includes.aside')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Contact</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contact</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Form</h3>
                                </div>
                                <form method="post" action="{{ route('contact.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input required type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input required pattern="[0-9]{9}" value="{{ old('contact') }}" title="Should be 9 digits" type="text" class="form-control" name="contact" placeholder="Enter contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input required type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter e-mail">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('contact.index') }}" class="btn btn-secondary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('includes.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/AdminLTE-master/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('/AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>