@extends('layout')

@section('title', 'Editar Categoría')
@section('content')
<div class="form-container">
    <h2>Editar Categoría: {{ $category->name }}</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nombre de la Categoría:</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ $category->name }}" required autofocus>
            <small class="text-muted">Nombre único para identificar la categoría</small>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Descripción:</label>
            <textarea name="description" id="description" class="form-control" 
                      rows="4">{{ $category->description }}</textarea>
            <small class="text-muted">Opcional - Describe brevemente esta categoría</small>
        </div>

        <div class="form-group">
            <div class="card">
                <div class="card-body">
                    <h5><i class="fas fa-info-circle me-2"></i>Información de la Categoría</h5>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <small>ID:</small>
                            <div class="fs-5">{{ $category->id }}</div>
                        </div>
                        <div class="col-md-6">
                            <small>Productos asociados:</small>
                            <div class="fs-5">
                                <span class="badge {{ $category->products_count > 0 ? 'badge-success' : 'badge-warning' }}">
                                    {{ $category->products_count ?? 0 }} productos
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Actualizar Categoría
            </button>
            <a href="{{ route('categories.index') }}" class="btn btn-outline btn-lg">
                <i class="fas fa-arrow-left"></i> Volver al Listado
            </a>
        </div>
    </form>
</div>

<style>
    .card {
        background: rgba(255, 255, 255, 0.03) !important;
        border: 1px solid var(--border-color) !important;
    }
    
    .card-body h5 {
        color: var(--text-primary);
        margin-bottom: 15px;
        font-size: 1.1rem;
    }
    
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
    
    .col-md-6 small {
        display: block;
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin-bottom: 5px;
    }
    
    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-bottom: 15px;
        }
    }
</style>
@endsection