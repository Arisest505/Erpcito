@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>

    <form id="createForm" method="POST" action="{{ route('productos.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Producto</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" id="description" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit_price">Precio Unitario</label>
            <input type="number" id="unit_price" name="unit_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="unit_of_measure">Unidad de Medida</label>
            <input type="text" id="unit_of_measure" name="unit_of_measure" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">Categoría</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="">Seleccionar Categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="almacen_id">Almacén</label>
            <select id="almacen_id" name="almacen_id" class="form-control" required>
                <option value="">Seleccionar Almacén</option>
                @foreach($almacenes as $almacen)
                    <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>
</div>
@endsection
