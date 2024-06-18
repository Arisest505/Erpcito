@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Almacenes</h2>
                <link rel="stylesheet" href="{{ asset('css/almacen.css') }}">

                <!-- Mostrar mensaje de éxito si existe -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Formulario para crear nuevo almacén -->
                <div id="formulario">
                    <form method="POST" action="{{ route('almacens.store') }}">
                        @csrf

                        {{-- Campo para el nombre del almacén --}}
                        <div class="form-group">
                            <label for="nombre">Nombre del Almacén</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        {{-- Campo para la ubicación del almacén --}}
                        <div class="form-group">
                            <label for="ubicacion">Ubicación del Almacén</label>
                            <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
                        </div>

                        {{-- Botón para enviar el formulario --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Crear Almacén</button>
                        </div>
                    </form>
                </div>

                <!-- Tabla de almacenes -->
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Ubicación</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($almacenes as $almacen)
                            <tr>
                                <td>{{ $almacen->id }}</td>
                                <td>{{ $almacen->nombre }}</td>
                                <td>{{ $almacen->ubicacion }}</td>
                                <td>{{ $almacen->created_at }}</td>
                                <td>{{ $almacen->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Incluir jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
