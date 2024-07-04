@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Categoría Productos</h2>
        <link rel="stylesheet" href="{{ asset('css/category_products.css') }}">

        <!-- Botón "Atrás" -->
        @if($selected_category_id)
            <a href="{{ route('logistica') }}" class="btn btn-back">Atrás</a>
        @endif

        <!-- Formulario de búsqueda por categoría -->
        <form method="GET" action="{{ route('categoria_productos.index') }}" class="form-inline mb-3" id="formulario">
            <div class="form-group">
                <label for="category_id" class="mr-2">Filtrar por Categoría:</label>
                <select name="category_id" id="category_id" class="form-control mr-2">
                    <option value="">Todas</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $selected_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>

        <!-- Tabla de productos -->
        @if(!empty($products) && count($products) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio Unitario</th>
                            <th>Unidad de Medida</th>
                            <th>Stock</th>
                            <th>Categoría</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
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
                                <td>{{ $product->category->name ?? 'Sin categoría' }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>
                                    <!-- Aquí van los enlaces o botones para acciones relacionadas con el producto -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No hay productos disponibles.
            </div>
        @endif
    </div>
@endsection
