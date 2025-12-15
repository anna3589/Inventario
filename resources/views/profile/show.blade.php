@extends('layout')

@section('title', 'Perfil de ' . ($user->name ?? 'Usuario'))
@section('content')
<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="fas fa-user-circle"></i>
        </div>
        <h2>{{ $user->name ?? 'Usuario' }}</h2>
        <p class="text-light">{{ $user->email ?? 'usuario@ejemplo.com' }}</p>
        <div class="badge badge-success mt-3">Administrador</div>
    </div>
    
    <div class="profile-info">
        <div class="row">
            <div class="col-md-6">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-envelope"></i> Email
                    </div>
                    <div class="info-value">
                        {{ $user->email ?? 'No disponible' }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-calendar-alt"></i> Fecha de Registro
                    </div>
                    <div class="info-value">
                        @if(isset($user->created_at) && $user->created_at)
                            {{ $user->created_at->format('d/m/Y') }}
                        @else
                            No registrada
                        @endif
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-user-tag"></i> Rol
                    </div>
                    <div class="info-value">
                        Administrador del Sistema
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-chart-bar"></i> Estadísticas
                    </div>
                    <div class="info-value">
                        <div class="row">
                            <div class="col-6">
                                <small>Categorías</small>
                                <div class="fs-5">{{ App\Models\Category::count() }}</div>
                            </div>
                            <div class="col-6">
                                <small>Productos</small>
                                <div class="fs-5">{{ App\Models\Product::count() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-id-card"></i> ID de Usuario
                    </div>
                    <div class="info-value">
                        #{{ $user->id ?? '000' }}
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-label">
                        <i class="fas fa-shield-alt"></i> Estado
                    </div>
                    <div class="info-value">
                        <span class="badge badge-success">Activo</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5 pt-4 border-top border-dark">
            <a href="{{ url('/') }}" class="btn btn-outline btn-lg">
                <i class="fas fa-home me-2"></i> Volver al Inicio
            </a>
            <button class="btn btn-primary btn-lg ms-2" onclick="window.print()">
                <i class="fas fa-print me-2"></i> Imprimir Perfil
            </button>
            @if(isset($user->id) && $user->id)
                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-success btn-lg ms-2">
                    <i class="fas fa-edit me-2"></i> Editar Perfil
                </a>
            @endif
        </div>
    </div>
</div>

<style>
    .row .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
        padding: 0 10px;
    }
    
    .row .col-6 small {
        display: block;
        color: var(--text-secondary);
        font-size: 0.85rem;
        margin-bottom: 5px;
    }
    
    .border-dark {
        border-color: var(--border-color) !important;
    }
</style>
@endsection