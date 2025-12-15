@extends('layout')

@section('title', 'Vista Combinada - Categorías con Productos')
@section('content')

<div class="text-center mb-5">
    <div class="btn-group">
        <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-box"></i> Crear Producto
        </a>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-tag"></i> Crear Categoría
        </a>
        <a href="{{ route('products.index') }}" class="btn btn-warning btn-lg">
            <i class="fas fa-list"></i> Solo Productos
        </a>
    </div>
</div>

@if($categories->isEmpty())
<div class="empty-state">
    <i class="fas fa-layer-group"></i>
    <h3>No hay categorías registradas</h3>
    <p>Crea tu primera categoría para comenzar a organizar tus productos.</p>
    <a href="{{ route('categories.create') }}" class="btn btn-success mt-3">
        <i class="fas fa-plus"></i> Crear Primera Categoría
    </a>
</div>
@else
@foreach($categories as $category)
<div class="card">
    <div class="card-header">
        <h3>
            <i class="fas fa-tag me-2"></i>{{ $category->name }}
            @if($category->description)
            <small class="text-muted ms-2">- {{ $category->description }}</small>
            @endif
        </h3>
        <div class="action-buttons">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar
            </a>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirmDelete('¿Eliminar categoría y todos sus productos?')">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </form>
            <a href="{{ route('products.create') }}?category_id={{ $category->id }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Agregar Producto
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($category->products->count() > 0)
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                <strong>{{ $product->name }}</strong>
                                @if($product->description)
                                <br><small class="text-muted">{{ Str::limit($product->description, 50) }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-success">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $product->stock_quantity > 10 ? 'badge-success' : ($product->stock_quantity > 0 ? 'badge-warning' : 'badge-danger') }}">
                                    {{ $product->stock_quantity }} unidades
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete('¿Eliminar producto?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state py-4">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">No hay productos en esta categoría</h4>
                <p class="text-muted">Agrega productos para comenzar a gestionar el inventario.</p>
                <a href="{{ route('products.create') }}?category_id={{ $category->id }}" class="btn btn-success mt-3">
                    <i class="fas fa-plus"></i> Agregar Primer Producto
                </a>
            </div>
        @endif
    </div>
</div>
@endforeach
@endif
@endsection