<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/style.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('img/favi.png') }}" type="image/x-icon">
    <title>@yield('title','SGCA')</title>
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img class="logo me-2" src="{{ asset('img/logo1.png') }}" alt="logo" height="40">
                    <span>Concesionarios de Automóviles</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- Botón Vehículos -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehiculos.index') }}">
                                <i class="bi bi-truck-front me-1"></i>Vehículos
                            </a>
                        </li>
                        
                        <!-- Botón Clientes -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clientes.index') }}">
                                <i class="bi bi-people me-1"></i>Clientes
                            </a>
                        </li>
                        
                        <!-- Botón Ventas -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('ventas.index') }}">
                                <i class="bi bi-cart me-1"></i>Ventas
                            </a>
                        </li>

                        @auth
                        <!-- Botón Cerrar Sesión -->
                        <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                        @endauth

                        @guest
                        <!-- Botones de Autenticación -->
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar sesión
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-person-plus"></i> Registrarse
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-custom bg-dark text-white py-3">
        <div class="container text-center">
            <p class="mb-0">
                © {{ date('Y') }} Copyright:
                <a href="{{ url('/') }}" class="text-white text-decoration-none">SGCA</a>
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>