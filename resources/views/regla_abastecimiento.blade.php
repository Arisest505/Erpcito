@extends('layouts.app')

@section('content')
    <!-- Botón de "Atrás" -->
    @isset($isEditing)
    <div class="text-right">
        <a href="{{ route('logistica') }}" class="btn btn-secondary mb-3">Atrás</a>
    </div>
    @endisset

    <div class="container">
        <h2>Reglas de Abastecimiento</h2>
        <link rel="stylesheet" href="{{ asset('css/supplyrule.css') }}">

        <!-- Mostrar mensaje de éxito si existe -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Contenedor para crear nueva regla de abastecimiento -->
        <div class="form-container">
            <h3>Crear Regla de Abastecimiento</h3>
            <form method="POST" action="{{ route('supply_rules.store') }}" class="form-inline">
                @csrf
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="min_quantity">Cantidad Mínima</label>
                    <input type="number" id="min_quantity" name="min_quantity" class="form-control" min="0" required>
                </div>

                <div class="form-group">
                    <label for="max_quantity">Cantidad Máxima</label>
                    <input type="number" id="max_quantity" name="max_quantity" class="form-control" min="0" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Crear Regla</button>
                </div>
            </form>
        </div>

        <!-- Contenedor para editar regla de abastecimiento -->
        <div class="form-container">
            <h3>Editar Regla de Abastecimiento</h3>
            @isset($supplyRule)
                <form method="POST" action="{{ route('supply_rules.update', $supplyRule->id) }}" id="editForm" class="form-inline">
                    @csrf
                    @method('PUT') <!-- Método PUT para actualizar -->
                    <div class="form-group">
                        <label for="product_id">Producto</label>
                        <select name="product_id" id="product_id" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $supplyRule->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="min_quantity">Cantidad Mínima</label>
                        <input type="number" id="min_quantity" name="min_quantity" class="form-control" min="0" value="{{ $supplyRule->min_quantity }}" required>
                    </div>

                    <div class="form-group">
                        <label for="max_quantity">Cantidad Máxima</label>
                        <input type="number" id="max_quantity" name="max_quantity" class="form-control" min="0" value="{{ $supplyRule->max_quantity }}" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar Regla</button>
                    </div>
                </form>
            @else
                <p>Seleccione una regla para editar.</p>
            @endisset
        </div>

        <!-- Contenedor separado para la tabla -->
        <div class="table-container">
            <h3>Reglas de Abastecimiento Existentes</h3>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad Mínima</th>
                        <th>Cantidad Máxima</th>
                        <th>Acciones</th> <!-- Nueva columna para el botón de actualizar -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($supplyRules as $rule)
                        <tr>
                            <td>{{ $rule->product->name }}</td>
                            <td>{{ $rule->min_quantity }}</td>
                            <td>{{ $rule->max_quantity }}</td>
                            <td>
                                <a href="{{ route('supply_rules.edit', $rule->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('supply_rules.destroy', $rule->id) }}" method="POST" style="display:inline-block;">
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
    </div>
@endsection
