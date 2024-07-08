<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

</head>
<body>
    <div id="app">

        @if (!request()->is('register','login','categoria_productos*', 'almacenes*', 'regla_abastecimiento*', 'unidad_medida*', 'stock*', 'historial_movimientos*', 'analisis_movimiento*', 'rendimiento*', 'productos*', 'seguimiento*', 'recepcion*', 'entrega*', 'inventario*'))
            @include('layouts.navbar')
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>
