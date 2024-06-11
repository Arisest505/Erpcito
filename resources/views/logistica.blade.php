

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Arise - Logística') }}</title>

    <!-- css -->

    @vite(['resources/css/logistica.css', '/resources/js/logistica.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


</head>

<body>
    <div class="navbar">
        <a href="{{ route('home') }}" class="active">Inicio</a>
        <div class="dropdown">
            <button class="dropbtn">Almacen
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ route('almacenes') }}">Almacenes</a>
                <a href="{{ route('categoria_productos') }}">Categoría Productos</a>
                <a href="{{ route('regla_abastecimiento') }}">Regla de Abastecimiento</a>
                <a href="{{ route('unidad_medida') }}">Unidad de Medida</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Informe
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ route('stock') }}">Stock</a>
                <a href="{{ route('historial_movimientos') }}">Historial de Movimientos</a>
                <a href="{{ route('analisis_movimiento') }}">Análisis de Movimiento</a>
                <a href="{{ route('rendimiento') }}">Rendimiento</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Producto
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ route('productos') }}">Productos</a>
                <a href="{{ route('seguimiento') }}">Seguimiento</a>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Operacion
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="{{ route('recepcion') }}">Recepción</a>
                <a href="{{ route('entrega') }}">Entrega</a>
                <a href="{{ route('inventario') }}">Inventario</a>
            </div>
        </div>
        <a href="#">Contacto</a>
    </div>
    <main class="py-4">
        @yield('content')
    </main>


</body>
</html>
