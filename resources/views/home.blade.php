@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-speedometer2"></i> Dashboard</h4>
                </div>
                <div class="card-body">
                    <h5>Bienvenido al Sistema de Gestión de Investigación</h5>
                    <p>Selecciona una opción del menú para comenzar.</p>
                    
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-people display-4 text-primary mb-3"></i>
                                    <h5>Gestionar Personas</h5>
                                    <p>Administra investigadores y personal</p>
                                    <a href="{{ route('personas.index') }}" class="btn btn-primary">Ver Personas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-folder2-open display-4 text-success mb-3"></i>
                                    <h5>Gestionar Proyectos</h5>
                                    <p>Administra proyectos de investigación</p>
                                    <a href="{{ route('proyectos.index') }}" class="btn btn-success">Ver Proyectos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection