@extends('layout')

@section('title', 'Detalles del Proveedor')
@section('content')
<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="fas fa-truck"></i>
        </div>
        <h2>{{ $supplier->name }}</h2>
        <p class="text-light">{{ $supplier->email }}</p>
        <div class="badge badge-success mt-3">Proveedor Activo</div>
    </div>
    
    <div class="profile-info">
        <div class="row">
            <div class="col-md-6">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-user"></i> Persona de Contacto
                    </div>
                    <div class="info-value">
                        {{ $supplier->contact_person ?? 'No especificado' }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-phone"></i> Teléfono
                    </div>
                    <div class="info-value">
                        {{ $supplier->phone ?? 'No especificado' }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-envelope"></i> Email
                    </div>
                    <div class="info-value">
                        {{ $supplier->email ?? 'No especificado' }}
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-map-marker-alt"></i> Dirección
                    </div>
                    <div class="info-value">
                        {{ $supplier->address ?? 'No especificada' }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-box"></i> Productos Suministrados
                    </div>
                    <div class="info-value">
                        <span class="badge {{ $supplier->products->count() > 0 ? 'badge-success' : 'badge-warning' }}">
                            {{ $supplier->products->count() }} productos
                        </span>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-id-card"></i> ID del Proveedor
                    </div>
                    <div class="info-value">
                        #{{ $supplier->id }}
                    </div>
                </div>
            </div>
        </div>

        @if($supplier->products->count() > 0)
        <div class="mt-5">
            <h4 class="mb-3"><i class="fas fa-list"></i> Productos Suministrados</h4>
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Precio de Compra</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supplier->products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>
                                ${{ number_format($product->pivot->purchase_price ?? 0, 2) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        
        <div class="text-center mt-5 pt-4 border-top border-dark">
            <a href="{{ route('suppliers.index') }}" class="btn btn-outline btn-lg">
                <i class="fas fa-arrow-left"></i> Volver al Listado
            </a>
            <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning btn-lg ms-2">
                <i class="fas fa-edit"></i> Editar Proveedor
            </a>
        </div>
    </div>
</div>

<style>
    .row .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 10px;
    }
    
    .border-dark {
        border-color: var(--border-color) !important;
    }
</style>
@endsection