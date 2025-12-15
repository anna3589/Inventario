@extends('layout')

@section('title', 'Editar Perfil de ' . $user->name)
@section('content')
<div class="form-container">
    <h2>Editar Perfil: {{ $user->name }}</h2>

    <form action="{{ route('profile.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ $user->name }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" 
                   value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar):</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="text-muted">Mínimo 8 caracteres</small>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-save"></i> Actualizar Perfil
            </button>
            <a href="{{ route('profile.show', $user->id) }}" class="btn btn-outline btn-lg">
                <i class="fas fa-times"></i> Cancelar
            </a>
        </div>
    </form>
</div>
@endsection