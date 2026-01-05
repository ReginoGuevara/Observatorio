@extends('layouts.app')

@section('title', 'Lista de Proyectos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4><i class="bi bi-folder2-open"></i> Lista de Proyectos</h4>
                    <a href="{{ route('proyectos.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle"></i> Nuevo Proyecto
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí irían los datos de la base de datos -->
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <p class="text-muted">No hay proyectos registrados aún.</p>
                                        <a href="{{ route('proyectos.create') }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-plus-circle"></i> Crear primer proyecto
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection