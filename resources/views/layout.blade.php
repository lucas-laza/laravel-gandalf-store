<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">Gandalf Store</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="{{ Request::is('products') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/products') }}">All Products</a>
                </li>
                <li class="{{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="{{ Request::is('contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                </li>
                <li class="{{ Request::is('cart') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/cart') }}">Panier</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li>
                        <a class="nav-link" href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a>
                    </li>
                @else
                    @if (Auth::user()->is_admin)
                        <li>
                            <a class="nav-link" href="{{ url('admin') }}">Admin</a>
                        </li>
                    @endif
                    <li>
                        <a id="navbarDropdown" class="nav-link" href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href=""
                           onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @if (Str::contains(request()->path(), 'admin'))
            <a href="{{ url('admin') }}" class="">Back to admin</a>
        @endif
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
