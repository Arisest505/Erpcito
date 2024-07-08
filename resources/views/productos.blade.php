@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Productos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <a href="{{ route('productos.create') }}" class="btn btn-success">Crear Producto</a>
        </div>
    </div>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio Unitario</th>
                <th>Unidad de Medida</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Almacén</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>{{ $product->unit_of_measure }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ optional($product->category)->name }}</td>
                    <td>{{ optional($product->almacen)->nombre }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $product->id) }}" class="btn btn-primary">Editar</a>
                        <form method="POST" action="{{ route('productos.destroy', $product->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
