@extends('layout')

@section('title', 'Listado de Categorías')
@section('content')
{{-- Видалено <div class="page-header"><h1>Listado de Categorías</h1></div> --}}

<div class="text-center mb-5">
    <div class="btn-group">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus-circle"></i> Crear Nueva Categoría
        </a>
        <a href="{{ route('categories.with.products') }}" class="btn btn-primary btn-lg">
            <i class="fas fa-layer-group"></i> Vista Combinada
        </a>
    </div>
</div>

@if($categories->isEmpty())
<div class="empty-state">
    <i class="fas fa-tags"></i>
    <h3>No hay categorías registradas</h3>
    <p>Comienza creando tu primera categoría para organizar tus productos.</p>
    <a href="{{ route('categories.create') }}" class="btn btn-success mt-3">
        <i class="fas fa-plus"></i> Crear Primera Categoría
    </a>
</div>
@else
<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    <strong>{{ $category->name }}</strong>
                </td>
                <td>{{ $category->description ?: 'Sin descripción' }}</td>
                <td>
                    <span class="badge {{ $category->products_count > 0 ? 'badge-success' : 'badge-warning' }}">
                        {{ $category->products_count ?? 0 }} productos
                    </span>
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirmDelete('¿Eliminar categoría y todos sus productos?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                        <a href="{{ route('products.create') }}?category_id={{ $category->id }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i> Agregar Producto
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endsection