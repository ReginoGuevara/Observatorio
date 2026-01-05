<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Observatorio Científico') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,600,700|Roboto:300,400,500&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Styles adicionales -->
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --success-color: #27ae60;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: linear-gradient(to right, var(--primary-color), #34495e) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 1.5rem;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
            margin: 0 5px;
            border-radius: 4px;
        }
        
        .nav-link:hover {
            color: white !important;
            background: rgba(255,255,255,0.1);
            transform: translateY(-1px);
        }
        
        .hero-section {
            background: linear-gradient(rgba(44, 62, 80, 0.9), rgba(52, 73, 94, 0.9)), 
                        url('https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-top: -24px;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-subtitle {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .feature-card {
            background: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .stat-label {
            color: #7f8c8d;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-custom {
            background: var(--secondary-color);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
        }
        
        .btn-custom:hover {
            background: #2980b9;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 50px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--secondary-color);
        }
        
        footer {
            background: var(--primary-color);
            color: white;
            padding: 40px 0;
            margin-top: 80px;
        }
        
        .quick-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            margin-bottom: 8px;
            transition: color 0.3s;
        }
        
        .quick-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .hover-shadow {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-graph-up me-2"></i>
                    Observatorio Científico
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <i class="bi bi-house-door me-1"></i> Inicio
                            </a>
                        </li>
                        
                        @auth()
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-people me-1"></i> Investigadores
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('personas.index') }}">
                                    <i class="bi bi-list-check me-2"></i> Ver Todas</a></li>
                                <li><a class="dropdown-item" href="{{ route('personas.create') }}">
                                    <i class="bi bi-person-plus me-2"></i> Nuevo Investigador</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-search me-2"></i> Buscar Investigadores</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-folder2-open me-1"></i> Proyectos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('proyectos.index') }}">
                                    <i class="bi bi-diagram-3 me-2"></i> Ver Todos</a></li>
                                <li><a class="dropdown-item" href="{{ route('proyectos.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i> Nuevo Proyecto</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">
                                    <i class="bi bi-bar-chart me-2"></i> Estadísticas</a></li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-link me-1"></i> Relaciones
                            </a>
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-clipboard-data me-1"></i> Reportes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-text me-2"></i> Por Proyecto</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-person me-2"></i> Por Investigador</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-range me-2"></i> Por Período</a></li>
                            </ul>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right me-1"></i> {{ __('Iniciar Sesión') }}
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus me-1"></i> {{ __('Registrarse') }}
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-person me-2"></i> Mi Perfil
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="bi bi-gear me-2"></i> Configuración
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i> {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Contenido por defecto (welcome page) -->
        @if(Request::is('/'))
        <div class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h1 class="hero-title">Sistema de Gestión de Investigación</h1>
                        <p class="hero-subtitle">Administra investigadores, proyectos y resultados científicos de manera eficiente y centralizada.</p>
                        
                        @guest
                        <a href="{{ route('login') }}" class="btn btn-custom me-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i> Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-outline-light">
                            <i class="bi bi-person-plus me-2"></i> Registrarse
                        </a>
                        @else
                        <a href="{{ route('home') }}" class="btn btn-custom me-3">
                            <i class="bi bi-speedometer2 me-2"></i> Ir al Dashboard
                        </a>
                        <a href="{{ route('proyectos.create') }}" class="btn btn-outline-light">
                            <i class="bi bi-plus-circle me-2"></i> Nuevo Proyecto
                        </a>
                        @endguest
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067256.png" alt="Investigación" class="img-fluid" style="max-height: 300px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="py-5 bg-light">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-3 mb-4">
                        <div class="stat-card">
                            <div class="stat-number" id="count-investigadores">0</div>
                            <div class="stat-label">Investigadores</div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="stat-card">
                            <div class="stat-number" id="count-proyectos">0</div>
                            <div class="stat-label">Proyectos Activos</div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="stat-card">
                            <div class="stat-number" id="count-publicaciones">0</div>
                            <div class="stat-label">Publicaciones</div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="stat-card">
                            <div class="stat-number" id="count-colaboraciones">0</div>
                            <div class="stat-label">Colaboraciones</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Características -->
        <div class="py-5">
            <div class="container">
                <h2 class="section-title text-center">Características Principales</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4>Gestión de Investigadores</h4>
                            <p>Administra perfiles, categorías científicas, publicaciones y proyectos de cada investigador.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-diagram-3"></i>
                            </div>
                            <h4>Seguimiento de Proyectos</h4>
                            <p>Controla el estado, financiamiento, participantes y resultados de proyectos de investigación.</p>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-bar-chart"></i>
                            </div>
                            <h4>Reportes y Estadísticas</h4>
                            <p>Genera informes detallados y visualiza métricas de productividad científica.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acceso Rápido -->
        @auth
        <div class="py-5 bg-light">
            <div class="container">
                <h2 class="section-title text-center">Acceso Rápido</h2>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('personas.create') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100 hover-shadow">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-plus display-4 text-primary mb-3"></i>
                                    <h5>Nuevo Investigador</h5>
                                    <p class="text-muted">Agregar nuevo investigador al sistema</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('proyectos.create') }}" class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100 hover-shadow">
                                <div class="card-body text-center">
                                    <i class="bi bi-plus-circle display-4 text-success mb-3"></i>
                                    <h5>Nuevo Proyecto</h5>
                                    <p class="text-muted">Crear nuevo proyecto de investigación</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 mb-3">
                        <a href="#" class="text-decoration-none">
                            <div class="card border-0 shadow-sm h-100 hover-shadow">
                                <div class="card-body text-center">
                                    <i class="bi bi-file-earmark-text display-4 text-warning mb-3"></i>
                                    <h5>Generar Reporte</h5>
                                    <p class="text-muted">Crear reporte de actividades</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endauth

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h5><i class="bi bi-graph-up me-2"></i> Observatorio Científico</h5>
                        <p>Sistema de gestión de investigación científica y tecnológica.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5>Enlaces Rápidos</h5>
                        <div class="quick-links">
                            <a href="{{ route('personas.index') }}"><i class="bi bi-chevron-right me-1"></i> Investigadores</a>
                            <a href="{{ route('proyectos.index') }}"><i class="bi bi-chevron-right me-1"></i> Proyectos</a>
                            <a href="#"><i class="bi bi-chevron-right me-1"></i> Reportes</a>
                            <a href="#"><i class="bi bi-chevron-right me-1"></i> Ayuda</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h5>Contacto</h5>
                        <p><i class="bi bi-envelope me-2"></i> contacto@observatorio.edu</p>
                        <p><i class="bi bi-telephone me-2"></i> +1 234 567 890</p>
                    </div>
                </div>
                <hr class="bg-light">
                <div class="text-center pt-3">
                    <p class="mb-0">&copy; {{ date('Y') }} Observatorio Científico. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
        @endif

        <main class="py-4">
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </div>
    
    @livewireScripts
    
    <script>
        // Animación para los contadores
        document.addEventListener('DOMContentLoaded', function() {
            // Simular datos (en producción estos vendrían de la base de datos)
            const counters = [
                { id: 'count-investigadores', target: 125, suffix: '+' },
                { id: 'count-proyectos', target: 48, suffix: '' },
                { id: 'count-publicaciones', target: 326, suffix: '+' },
                { id: 'count-colaboraciones', target: 89, suffix: '' }
            ];
            
            counters.forEach(counter => {
                const element = document.getElementById(counter.id);
                if (element) {
                    animateCounter(element, counter.target, counter.suffix);
                }
            });
            
            function animateCounter(element, target, suffix) {
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current) + suffix;
                }, 20);
            }
            
            // Efecto hover para tarjetas
            const cards = document.querySelectorAll('.hover-shadow');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.transform = 'translateY(-5px)';
                    card.style.transition = 'transform 0.3s';
                });
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
    
    <script type="module">
        const addModal = new bootstrap.Modal('#createDataModal');
        const editModal = new bootstrap.Modal('#updateDataModal');
        window.addEventListener('closeModal', () => {
           addModal.hide();
           editModal.hide();
        });
    </script>
</body>
</html>