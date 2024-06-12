@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrar Almacenes</div>
                <div class="card-body">
                    <!-- Formulario para crear un nuevo almacén -->
                    <form action="{{ route('crear_almacen') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre del almacén:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Almacén</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Lista de Almacenes</div>
                <div class="card-body">
                    <!-- Tabla para mostrar los almacenes existentes -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($almacenes as $almacen)
                            <tr>
                                <td>{{ $almacen->id }}</td>
                                <td>{{ $almacen->nombre }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
