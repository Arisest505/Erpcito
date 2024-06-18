<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Horizontal</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>
<body>
    <nav class="navbar">
        <!-- Usuario y Logout -->
        <div class="navbar-user">
            @guest
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <div class="dropdown">
                    <a href="#" class="dropbtn">{{ Auth::user()->name }} ▼</a>
                    <div class="dropdown-content">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>

        <!-- Links al centro -->
        <div class="navbar-menu">
            <a href="{{ route('logistica') }}">Logística</a>
            <a href="{{ route('contabilidad') }}">Contabilidad</a>
            <a href="{{ route('finanzas') }}">Finanzas</a>
            <a href="{{ route('linea_avicola') }}">Línea Avícola</a>
            <a href="{{ route('gestor_produccion') }}">Gestor de Producción</a>
        </div>

        <!-- Logo a la derecha -->
        <a href="#">
            <img src="{{ asset('img/Image_fox_white.png') }}" alt="Logo" class="navbar-logo">

        </a>
    </nav>
</body>
</html>
