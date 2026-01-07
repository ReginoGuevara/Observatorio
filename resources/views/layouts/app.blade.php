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
            --primary-color: #2d3748;
            --primary-dark: #1a202c;
            --secondary-color: #4a5568;
            --accent-color: #5a67d8;
            --accent-light: #6b7edb;
            --success-color: #38a169;
            --warning-color: #ed8936;
            --danger-color: #e53e3e;
            --light-color: #f7fafc;
            --dark-color: #0f1419;
            --border-color: #e2e8f0;
            --gradient-primary: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            --gradient-secondary: linear-gradient(135deg, #5a67d8 0%, #4c51bf 100%);
        }
        
        * {
            transition: all 0.2s ease;
        }
        
        body {
            font-family: 'Roboto', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 50%, #f7fafc 100%);
            min-height: 100vh;
            color: #2d3748;
        }
        
        .navbar {
            background: var(--gradient-primary) !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .navbar-brand {
            font-weight: 800;
            color: white !important;
            font-size: 1.4rem;
            letter-spacing: -0.5px;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.85) !important;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin: 0 8px;
            border-radius: 6px;
            position: relative;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: rgba(255,255,255,0.8);
            transition: width 0.3s;
            border-radius: 1px;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        .nav-link:hover {
            color: white !important;
            transform: translateY(-2px);
        }
        
        .dropdown-menu {
            border: none;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            background: white;
            margin-top: 8px;
        }
        
        .dropdown-item {
            color: #2d3748;
            border-radius: 6px;
            margin: 4px 8px;
            transition: all 0.2s;
        }
        
        .dropdown-item:hover {
            background: linear-gradient(135deg, #edf2f7 0%, #e6f0ff 100%);
            color: #5a67d8;
            transform: translateX(4px);
        }
        
        .hero-section {
            background: linear-gradient(135deg, rgba(45, 55, 72, 0.95), rgba(74, 85, 104, 0.95)), 
                        url('https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 0;
            margin-top: -24px;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 50%, rgba(45, 55, 72, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0,0,0,0.2);
            letter-spacing: -1px;
            position: relative;
            z-index: 1;
            animation: fadeInDown 0.6s ease-out;
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            position: relative;
            z-index: 1;
            animation: fadeInUp 0.6s ease-out 0.1s backwards;
            font-weight: 300;
            letter-spacing: 0.3px;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-light);
            transform: scaleX(0);
            transition: transform 0.3s;
        }
        
        .feature-card:hover::before {
            transform: scaleX(1);
        }
        
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e0;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: #5a67d8;
            margin-bottom: 20px;
        }
        
        .feature-card h4 {
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 12px;
            font-size: 1.25rem;
        }
        
        .feature-card p {
            color: #718096;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 32px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(90, 103, 216, 0.02);
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 0;
        }
        
        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e0;
        }
        
        .stat-card:hover::before {
            opacity: 1;
        }
        
        .stat-number {
            font-size: 2.8rem;
            font-weight: 800;
            color: #5a67d8;
            position: relative;
            z-index: 1;
        }
        
        .stat-label {
            color: #718096;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            font-weight: 600;
            margin-top: 12px;
            position: relative;
            z-index: 1;
        }
        
        .btn-custom {
            background: var(--accent-light);
            color: white;
            padding: 14px 32px;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 0.95rem;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(90, 103, 216, 0.3);
        }
        
        .btn-custom:hover {
            background: #5a67d8;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(90, 103, 216, 0.4);
        }
        
        .btn-custom:active {
            transform: translateY(0);
        }
        
        .section-title {
            color: #1a202c;
            font-weight: 800;
            margin-bottom: 50px;
            position: relative;
            padding-bottom: 20px;
            font-size: 2rem;
            letter-spacing: -0.5px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--accent-light);
            border-radius: 2px;
        }
        }
        
        footer {
            background: var(--gradient-primary);
            color: white;
            padding: 60px 0 20px;
            margin-top: 100px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }
        
        footer h5 {
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.1rem;
            letter-spacing: 0.3px;
        }
        
        footer p {
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
            line-height: 1.8;
        }
        
        .quick-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        
        .quick-links a:hover {
            color: white;
            transform: translateX(4px);
        }
        
        .hover-shadow {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .hover-shadow:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12) !important;
        }
        
        /* Estilos para tablas modernizadas */
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        
        .table thead {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-bottom: 2px solid #e2e8f0;
        }
        
        .table thead th {
            font-weight: 700;
            color: #1a202c;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 16px;
            border: none;
        }
        
        .table tbody tr {
            border-bottom: 1px solid #e2e8f0;
            transition: all 0.2s;
        }
        
        .table tbody tr:hover {
            background: rgba(90, 103, 216, 0.02);
        }
        
        .table tbody td {
            padding: 14px 16px;
            color: #4a5568;
            font-size: 0.9rem;
            vertical-align: middle;
        }
        
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            letter-spacing: 0.3px;
        }
        
        .badge.bg-success {
            background: #c6f6d5 !important;
            color: #22543d !important;
            box-shadow: 0 2px 8px rgba(56, 161, 105, 0.15);
        }
        
        .badge.bg-warning {
            background: #feebc8 !important;
            color: #7c2d12 !important;
            box-shadow: 0 2px 8px rgba(237, 137, 54, 0.15);
        }
        
        .badge.bg-secondary {
            background: #cbd5e0 !important;
            color: #2d3748 !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .badge.bg-danger {
            background: #fed7d7 !important;
            color: #742a2a !important;
            box-shadow: 0 2px 8px rgba(229, 62, 62, 0.15);
        }
        
        .badge.bg-info {
            background: #bee3f8 !important;
            color: #2c5282 !important;
            box-shadow: 0 2px 8px rgba(90, 103, 216, 0.15);
        }
        
        /* Estilos para botones mejorados */
        .btn-outline-primary, .btn-outline-secondary, .btn-outline-danger {
            border-width: 1.5px;
            font-weight: 600;
            border-radius: 6px;
            transition: all 0.2s;
        }
        
        .btn-outline-primary {
            color: #5a67d8;
            border-color: #5a67d8;
        }
        
        .btn-outline-primary:hover {
            background: #5a67d8;
            border-color: #5a67d8;
            box-shadow: 0 4px 12px rgba(90, 103, 216, 0.25);
        }
        
        .btn-outline-secondary {
            color: #4a5568;
            border-color: #cbd5e0;
        }
        
        .btn-outline-secondary:hover {
            background: #edf2f7;
            border-color: #4a5568;
            color: #4a5568;
        }
        
        .btn-outline-danger {
            color: #e53e3e;
            border-color: #fc8181;
        }
        
        .btn-outline-danger:hover {
            background: #e53e3e;
            border-color: #e53e3e;
            box-shadow: 0 4px 12px rgba(229, 62, 62, 0.25);
        }
        
        .btn-primary {
            background: var(--accent-light) !important;
            border: none;
            font-weight: 600;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(90, 103, 216, 0.2);
        }
        
        .btn-primary:hover {
            background: #5a67d8 !important;
            box-shadow: 0 4px 12px rgba(90, 103, 216, 0.3);
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background: #cbd5e0 !important;
            border: none;
            font-weight: 600;
            border-radius: 6px;
            color: #2d3748;
        }
        
        .btn-secondary:hover {
            background: #a0aec0 !important;
            transform: translateY(-1px);
        }
        
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            transition: all 0.3s;
        }
        
        .card:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.08);
            border-color: #cbd5e0;
        }
        
        .card-header {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-bottom: 1px solid #e2e8f0;
            padding: 20px;
            font-weight: 700;
            color: #1a202c;
        }
        
        .card-body {
            padding: 24px;
            color: #2d3748;
        }
        
        .input-group-text {
            background: white !important;
            border: 1.5px solid #e2e8f0 !important;
            color: #a0aec0 !important;
        }
        
        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 0.9rem;
            color: #2d3748;
        }
        
        .form-control:focus {
            border-color: #5a67d8;
            box-shadow: 0 0 0 3px rgba(90, 103, 216, 0.1);
            color: #2d3748;
        }
        
        .form-select {
            border: 1.5px solid #e2e8f0;
            border-radius: 6px;
            padding: 10px 12px;
            font-size: 0.9rem;
            color: #2d3748;
        }
        
        .form-select:focus {
            border-color: #5a67d8;
            box-shadow: 0 0 0 3px rgba(90, 103, 216, 0.1);
        }
        
        .modal-content {
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        }
        
        .modal-header {
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-bottom: 1px solid #e2e8f0;
            font-weight: 700;
            color: #1a202c;
        }
        
        .alert {
            border: none;
            border-radius: 8px;
            border-left: 4px solid;
            animation: slideIn 0.3s ease-out;
        }
        
        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border-left-color: #38a169;
        }
        
        .alert-danger {
            background: #fef2f2;
            color: #742a2a;
            border-left-color: #e53e3e;
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