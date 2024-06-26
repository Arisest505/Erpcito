@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Almacenes</h2>
                <link rel="stylesheet" href="{{ asset('css/almacen.css') }}">

                <!-- Mostrar mensaje de éxito si existe -->
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Contenedor para los formularios -->
                <div class="row">
                    <!-- Formulario para crear nuevo almacén -->
                    <div class="col-md-6">
                        <div id="formulario">
                            <h3>Crear Almacén</h3>
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
                    </div>

                    <!-- Formulario para editar almacén -->
                    <div class="col-md-6">
                        <div id="formulario">
                            <h3>Editar Almacén</h3>
                            @isset($almacen)
                                <form method="POST" action="{{ route('almacens.update', $almacen->id) }}" id="editForm">
                                    @csrf
                                    @method('PUT') <!-- Método PUT para actualizar -->

                                    {{-- Campo para el nombre del almacén --}}
                                    <div class="form-group">
                                        <label for="edit-nombre">Nombre del Almacén</label>
                                        <input type="text" id="edit-nombre" name="nombre" class="form-control" value="{{ $almacen->nombre }}" required>
                                    </div>

                                    {{-- Campo para la ubicación del almacén --}}
                                    <div class="form-group">
                                        <label for="edit-ubicacion">Ubicación del Almacén</label>
                                        <input type="text" id="edit-ubicacion" name="ubicacion" class="form-control" value="{{ $almacen->ubicacion }}" required>
                                    </div>

                                    {{-- Botón para enviar el formulario --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Actualizar Almacén</button>
                                    </div>
                                </form>
                            @else
                                <p>Seleccione un almacén para editar.</p>
                            @endisset
                        </div>
                    </div>
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
                            <th>Acciones</th> <!-- Nueva columna para el botón de actualizar -->
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
                                <td>
                                    <a href="{{ route('almacens.edit', $almacen->id) }}" class="btn btn-primary">Actualizar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
