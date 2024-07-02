@extends('layouts.app')

@section('content')
    <!-- Carga de recursos con Vite -->
    <link rel="stylesheet" href="{{ asset('css/logistica-nav.css') }}">

    <!-- Contenedor principal -->
    <div class="container-fluid">
        <!-- Barra de navegación principal -->
        <div class="main-navbar">
            <button class="menu-toggle" onclick="toggleSideMenu()">
                <i class="fa fa-bars">☰</i> <!-- Icono de hamburguesa -->
            </button>
        </div>

        <!-- Menú lateral desplegable -->
        <div class="side-menu" id="sideMenu">
            <a href="javascript:void(0)" class="close-btn" onclick="toggleSideMenu()">&times;</a> <!-- Botón de cerrar (×) -->
            <a href="{{ route('home') }}" class="active">Inicio</a>
            <button class="dropdown-btn">Almacén
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('almacenes') }}">Almacenes</a>
                <a href="{{ route('categoria_productos.index') }}">Categoría Productos</a>
                <a href="{{ route('regla_abastecimiento') }}">Regla de Abastecimiento</a>
                <a href="{{ route('unidad_medida') }}">Unidad de Medida</a>
            </div>

            <button class="dropdown-btn">Informe
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('stock') }}">Stock</a>
                <a href="{{ route('historial_movimientos') }}">Historial de Movimientos</a>
                <a href="{{ route('analisis_movimiento') }}">Análisis de Movimiento</a>
                <a href="{{ route('rendimiento') }}">Rendimiento</a>
            </div>
            <button class="dropdown-btn">Producto
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('productos') }}">Productos</a>
                <a href="{{ route('seguimiento') }}">Seguimiento</a>
            </div>
            <button class="dropdown-btn">Operación
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-container">
                <a href="{{ route('recepcion') }}">Recepción</a>
                <a href="{{ route('entrega') }}">Entrega</a>
                <a href="{{ route('inventario') }}">Inventario</a>
            </div>
            <a href="#">Contacto</a>
        </div>

        <!-- Contenido principal de la página -->
        <div class="main-content">
            <main class="py-4">
                <!-- Contenedor dinámico para cargar el contenido -->
                <div id="dynamic-content">
                    <!-- Aquí se rellenará el contenido específico de cada vista -->
                    @yield('main-content')
                </div>
            </main>
        </div>
    </div>

    <!-- Script para controlar el menú desplegable y carga dinámica -->
    <script>
        function toggleSideMenu() {
            var sideMenu = document.getElementById('sideMenu');
            var menuToggle = document.querySelector('.menu-toggle');
            var mainContent = document.querySelector('.main-content');

            // Verifica la posición del menú
            var sideMenuLeft = parseInt(window.getComputedStyle(sideMenu).left);

            if (sideMenuLeft === -250) {
                sideMenu.style.left = '0';
                menuToggle.innerHTML = '&#10005;'; // Cambia el icono a una X (cerrar)
                mainContent.classList.add('menu-open');
            } else {
                sideMenu.style.left = '-250px';
                menuToggle.innerHTML = '&#9776;'; // Cambia el icono a las barras (hamburguesa)
                mainContent.classList.remove('menu-open');
            }
        }

        // Control de los botones desplegables
        document.addEventListener('DOMContentLoaded', function() {
        var dropdownBtns = document.querySelectorAll('.dropdown-btn');
        dropdownBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var dropdownContent = this.nextElementSibling;
                dropdownContent.classList.toggle('show');
            });
        });



    });

    // Agregar eventos clic para los enlaces del menú
    var almacenesLink = document.querySelector('.dropdown-container a[href="{{ route('almacenes') }}"]');
    almacenesLink.addEventListener('click', function(event) {
        event.preventDefault(); // Evitar la navegación normal
        loadAlmacenesContent(); // Llamar a función para cargar contenido de Almacenes
    });

    // Agregar eventos clic para los enlaces del menú
    var categoriaProductosLink = document.querySelector('.dropdown-container a[href="{{ route('categoria_productos.index') }}"]');
        if (categoriaProductosLink) {
            categoriaProductosLink.addEventListener('click', function(event) {
                event.preventDefault(); // Evitar la navegación normal
                loadCategoriaProductosContent(); // Llamar a función para cargar contenido de Categoría Productos
            });
        }

        // Agregar más eventos clic para otros enlaces de menú según sea necesario
        var reglaAbastecimientoLink = document.querySelector('.dropdown-container a[href="{{ route('regla_abastecimiento') }}"]');
    reglaAbastecimientoLink.addEventListener('click', function(event) {
        event.preventDefault();
        loadReglaAbastecimientoContent();
    });


    function loadCategoriaProductosContent() {
        fetch("{{ route('categoria_productos.index') }}")
            .then(response => response.text())
            .then(html => {
                document.getElementById('dynamic-content').innerHTML = html;
            })
            .catch(error => {
                console.error('Error al cargar el contenido de Categoría Productos:', error);
            });
    }



    // Agregar más eventos clic para otros enlaces de menú según sea necesario


function loadAlmacenesContent() {
    fetch("{{ route('almacenes') }}")
        .then(response => response.text())
        .then(html => {
            document.getElementById('dynamic-content').innerHTML = html;
        })
        .catch(error => {
            console.error('Error al cargar el contenido de Almacenes:', error);
        });
}

function loadReglaAbastecimientoContent() {
            fetch("{{ route('regla_abastecimiento') }}")
                .then(response => response.text())
                .then(html => {
                    document.getElementById('dynamic-content').innerHTML = html;
                })
                .catch(error => {
                    console.error('Error al cargar el contenido de Regla de Abastecimiento:', error);
                });
        }
// Agregar más funciones para cargar contenido de otros enlaces del menú según sea necesario

    </script>


@endsection
