@extends('layouts.app')

@section('content')
    <!-- Botón de "Atrás" -->
    @if($searchPerformed)
    <div class="text-right">
        <a href="{{ route('logistica') }}" class="btn btn-secondary mb-3">Atrás</a>
    </div>
    @endif

    <div class="container">
        <h1>Stock de Productos</h1>

        <!-- Formulario de búsqueda -->
        <form method="GET" action="{{ route('stock') }}" class="form-inline mb-4">
            <div class="form-group mr-3">
                <select name="almacen" class="form-control">
                    <option value="">Buscar por almacén</option>
                    @foreach($almacenes as $almacen)
                        <option value="{{ $almacen->id }}" {{ $selected_almacen == $almacen->id ? 'selected' : '' }}>
                            {{ $almacen->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mr-3">
              <select name="categoria" class="form-control">
                    <option value="">Buscar por categoría</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->name }}" {{ $selected_categoria == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mr-3">
                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Producto" value="{{ request()->input('nombre') }}">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        @if($searchPerformed && $products->isEmpty())
            <div class="alert alert-info" role="alert">
                No hay productos disponibles con los criterios de búsqueda.
            </div>
        @elseif($products->isEmpty())
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
                            <th>Almacén</th>
                            <th>Categoría</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha de Actualización</th>
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
                                <td>{{ $product->almacen->nombre ?? 'Sin almacén' }}</td>
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
