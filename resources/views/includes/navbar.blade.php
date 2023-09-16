<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i> {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!-- <div class="dropdown-divider"></div> -->
                <a href="{{ route('auth.logout') }}" class="dropdown-item">
                <i class="fa fa-arrow-right mr-2"></i> Logout
                </a>
            </div>
        </li>
        @else
        <li class="nav-item dropdown">
            <a class="nav-link" href="{{ route('auth.login') }}">
                <i class="far fa-user"></i> Sig In
            </a>
        </li>
        @endauth
    </ul>
</nav>