@extends('layout')

@section('title', 'Listado de Productos')
@section('content')

<div class="text-center mb-5">
    <a href="{{ route('products.create') }}" class="btn btn-success btn-lg">
        <i class="fas fa-plus-circle"></i> Crear Nuevo Producto
    </a>
</div>

@if($products->isEmpty())
<div class="empty-state">
    <i class="fas fa-boxes"></i>
    <h3>No hay productos registrados</h3>
    <p>Comienza creando tu primer producto para gestionar tu inventario.</p>
    <a href="{{ route('products.create') }}" class="btn btn-success mt-3">
        <i class="fas fa-plus"></i> Crear Primer Producto
    </a>
</div>
@else
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    <span class="badge badge-primary">
                        {{ $product->category->name ?? 'Sin categoría' }}
                    </span>
                </td>
                <td>
                    <strong>{{ $product->name }}</strong>
                    @if($product->description)
                    <br><small class="text-muted">{{ Str::limit($product->description, 40) }}</small>
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
@endif
@endsection