@extends('layouts.app')

@section('content')
    <!-- Botón de "Atrás" -->
    @if($searchPerformed)
    <div class="text-right">
        <a href="{{ route('logistica') }}" class="btn btn-secondary mb-3">Atrás</a>
    </div>
    @endif
    <div class="container">
        <h2>Unidad de Medida de Productos</h2>
        <link rel="stylesheet" href="{{ asset('css/unitofmeasure.css') }}">

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('unidad_medida') }}" class="form-inline mb-4">
            <div class="form-group mr-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto" value="{{ request()->input('nombre') }}">
            </div>
            <div class="form-group mr-3">
                <select name="category_id" class="form-control">
                    <option value="">Seleccione Categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $selected_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mr-3">
                <select name="unidad" class="form-control">
                    <option value="">Seleccione Unidad de Medida</option>
                    @foreach($unidades_medida as $unidad_medida)
                        <option value="{{ $unidad_medida->unit_of_measure }}" {{ $unidad == $unidad_medida->unit_of_measure ? 'selected' : '' }}>
                            {{ $unidad_medida->unit_of_measure }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        @if($products->isEmpty())
            <div class="alert alert-info" role="alert">
                No hay productos disponibles.
            </div>
        @else
            <div class="table-responsive mt-4">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
