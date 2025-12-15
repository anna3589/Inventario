@extends('layout')

@section('title', 'Crear Categoría')
@section('content')
<div class="form-container">
    <h2>Crear Nueva Categoría</h2>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Nombre de la Categoría:</label>
            <input type="text" id="name" name="name" class="form-control" required 
                   placeholder="Ej: Electrónica, Ropa, Alimentos..." autofocus>
            <small class="text-muted">Nombre único para identificar la categoría</small>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Descripción:</label>
            <textarea id="description" name="description" class="form-control" 
                      rows="4" placeholder="Describe brevemente esta categoría..."></textarea>
            <small class="text-muted">Opcional - Ayuda a identificar el tipo de productos</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success btn-lg">
                <i class="fas fa-save"></i> Guardar Categoría
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline btn-lg">
                <i class="fas fa-arrow-left"></i> Volver al Listado
            </a>
        </div>
    </form>
</div>
@endsection