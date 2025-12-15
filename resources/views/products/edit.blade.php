@extends('layout')

@section('title', 'Editar Producto')
@section('content')
<div class="form-container">
    <h2>Editar Producto: {{ $product->name }}</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="category_id" class="form-label">Categoría:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Seleccionar Categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name" class="form-label">Nombre del Producto:</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ $product->name }}" required autofocus>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price" class="form-label">Precio ($):</label>
                    <input type="number" step="0.01" name="price" id="price" 
                           class="form-control" value="{{ $product->price }}" required>
                    <small class="text-muted">Precio unitario en dólares</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock_quantity" class="form-label">Stock:</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" 
                           class="form-control" value="{{ $product->stock_quantity }}" required min="0">
                    <small class="text-muted">Cantidad disponible en inventario</small>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Descripción (Opcional):</label>
            <textarea name="description" id="description" class="form-control" 
                      rows="3">{{ $product->description ?? '' }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Actualizar Producto
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-outline btn-lg">
                <i class="fas fa-arrow-left"></i> Volver al Listado
            </a>
        </div>
    </form>
</div>

<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }
    
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 10px;
    }
    
    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }
    }
</style>
@endsection