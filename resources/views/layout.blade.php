<!DOCTYPE html>
<html lang="es" class="dark-theme">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <a href="{{ url('/') }}" class="logo">
                    <i class="fas fa-boxes"></i>
                    <span>Inventario Pro</span>
                </a>
                <nav class="main-nav">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="fas fa-tags"></i> Categorías
                    </a>
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="fas fa-box"></i> Productos
                    </a>
                    <a href="{{ route('suppliers.index') }}" class="nav-link">
                        <i class="fas fa-truck"></i> Proveedores
                    </a>
                    <a href="{{ route('categories.with.products') }}" class="nav-link">
                        <i class="fas fa-layer-group"></i> Vista Combinada
                    </a>
                    
                    @isset($currentUser)
                        <a href="{{ route('profile.show', $currentUser->id ?? 1) }}" class="nav-link">
                            <i class="fas fa-user-circle"></i> {{ $currentUser->name ?? 'Administrador' }}
                        </a>
                    @endisset
                </nav>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <div class="content-wrapper">
                <h1 class="page-title">@yield('title', 'Panel de Control')</h1>
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p><i class="fas fa-code"></i> Sistema de Gestión de Inventario - Laravel CRUD</p>
                <p class="text-muted">© {{ date('Y') }} - Anna Batuieva</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });
            
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });
                
                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            const cards = document.querySelectorAll('.category-card, .card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });

        function confirmDelete(message) {
            return confirm(message || '¿Estás seguro de que deseas eliminar este elemento?');
        }
    </script>
</body>
</html>