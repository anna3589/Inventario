@extends('layout')

@section('title', 'Crear Nuevo Producto')
@section('content')
<div class="form-container">
    <h2>Crear Nuevo Producto</h2>
    
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Nombre del Producto:</label>
            <input type="text" name="name" id="name" class="form-control" 
                   required placeholder="Ej: Laptop Dell XPS 13" autofocus>
            <small class="text-muted">Nombre descriptivo del producto</small>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price" class="form-label">Precio ($):</label>
                    <input type="number" name="price" id="price" 
                           class="form-control" step="0.01" required min="0.01" 
                           placeholder="0.00">
                    <small class="text-muted">Precio unitario en dólares</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="stock_quantity" class="form-label">Cantidad en Stock:</label>
                    <input type="number" name="stock_quantity" id="stock_quantity" 
                           class="form-control" required min="0" value="0">
                    <small class="text-muted">Cantidad disponible inicial</small>
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label for="category_id" class="form-label">Categoría:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Seleccionar Categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Categoría a la que pertenece el producto</small>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Descripción (Opcional):</label>
            <textarea name="description" id="description" class="form-control" 
                      rows="3" placeholder="Descripción detallada del producto..."></textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save"></i> Crear Producto
            </button>
            <a href="{{ route('products.index') }}" class="btn btn-outline btn-lg">
                <i class="fas fa-times"></i> Cancelar
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