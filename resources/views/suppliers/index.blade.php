@extends('layout')

@section('title', 'Proveedores')
@section('content')
<div class="page-header">
    <p class="text-muted">Gestión de proveedores y sus productos</p>
</div>

<div class="text-center mb-5">
    <a href="{{ route('suppliers.create') }}" class="btn btn-success btn-lg">
        <i class="fas fa-truck"></i> Nuevo Proveedor
    </a>
</div>

@if($suppliers->isEmpty())
<div class="empty-state">
    <i class="fas fa-truck-loading fa-3x text-muted mb-3"></i>
    <h3>No hay proveedores registrados</h3>
    <p>Comienza agregando tu primer proveedor.</p>
    <a href="{{ route('suppliers.create') }}" class="btn btn-success mt-3">
        <i class="fas fa-plus"></i> Crear Primer Proveedor
    </a>
</div>
@else
<div class="table-wrapper">
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Persona de Contacto</th>
                <th>Teléfono</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>
                    <strong>{{ $supplier->name }}</strong>
                    @if($supplier->email)
                    <br><small class="text-muted">{{ $supplier->email }}</small>
                    @endif
                </td>
                <td>{{ $supplier->contact_person ?? 'Sin contacto' }}</td>
                <td>{{ $supplier->phone ?? 'Sin teléfono' }}</td>
                <td>
                    <span class="badge {{ $supplier->products->count() > 0 ? 'badge-success' : 'badge-warning' }}">
                        {{ $supplier->products->count() }} productos
                    </span>
                </td>
                <td>
                    <div class="action-buttons">
                        <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('¿Eliminar proveedor?')">
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