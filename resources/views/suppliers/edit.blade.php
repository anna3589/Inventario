@extends('layout')

@section('title', 'Editar Proveedor')
@section('content')
<div class="form-container">
    <h2>Editar Proveedor: {{ $supplier->name }}</h2>

    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nombre del Proveedor:</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $supplier->name) }}" required autofocus>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="contact_person" class="form-label">Persona de Contacto:</label>
                    <input type="text" name="contact_person" id="contact_person" class="form-control"
                           value="{{ old('contact_person', $supplier->contact_person) }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone" class="form-label">Teléfono:</label>
                    <input type="text" name="phone" id="phone" class="form-control"
                           value="{{ old('phone', $supplier->phone) }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $supplier->email) }}">
        </div>

        <div class="form-group">
            <label for="address" class="form-label">Dirección:</label>
            <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $supplier->address) }}</textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Productos que suministra:</label>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 mb-2">
                    <label class="checkbox-label">
                        <input type="checkbox" name="products[]" value="{{ $product->id }}"
                            {{ in_array($product->id, $supplier->products->pluck('id')->toArray()) ? 'checked' : '' }}>
                        {{ $product->name }} (${{ number_format($product->price, 2) }})
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-warning btn-lg">
                <i class="fas fa-save"></i> Actualizar Proveedor
            </button>
            <a href="{{ route('suppliers.index') }}" class="btn btn-outline btn-lg">
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
    
    .col-md-6, .col-md-4 {
        padding: 0 10px;
    }
    
    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    
    .col-md-4 {
        flex: 0 0 33.333%;
        max-width: 33.333%;
    }
    
    .checkbox-label {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 6px;
        border: 1px solid var(--border-color);
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .checkbox-label:hover {
        background: rgba(229, 9, 20, 0.05);
        border-color: var(--netflix-red);
    }
    
    .checkbox-label input[type="checkbox"] {
        margin: 0;
    }
</style>
@endsection