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
                        <div class="mb-3 d-flex">
                            <form method="GET" action="{{ route('proyectos.index') }}" class="me-2">
                                <div class="input-group">
                                    <input type="search" name="q" class="form-control" placeholder="Buscar proyectos..." value="{{ request('q') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                </div>
                            </form>
                            <div class="ms-auto">
                                <a href="{{ route('proyectos.export') }}" class="btn btn-sm btn-outline-success">Exportar CSV</a>
                            </div>
                        </div>
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
                                @forelse($proyectos as $proyecto)
                                    <tr>
                                        <td>{{ $proyecto->id }}</td>
                                        <td>{{ $proyecto->nombre }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($proyecto->descripcion, 80) }}</td>
                                        <td>{{ $proyecto->estado }}</td>
                                        <td>
                                            <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                                            <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                                            <form method="POST" action="{{ route('proyectos.destroy', $proyecto->id) }}" class="d-inline ms-1" onsubmit="return confirm('¿Eliminar proyecto? Esta acción no se puede deshacer.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            <p class="text-muted">No hay proyectos registrados aún.</p>
                                            <a href="{{ route('proyectos.create') }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-circle"></i> Crear primer proyecto
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">{{ $proyectos->appends(request()->query())->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection