@extends('layouts.app')

@section('title', 'Lista de Investigadores')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4><i class="bi bi-people"></i> Lista de investigadores</h4>
                    <a href="{{ route('personas.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-plus"></i> Nuevo Investigador
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
                            <form method="GET" action="{{ route('personas.index') }}" class="me-2">
                                <div class="input-group">
                                    <input type="search" name="q" class="form-control" placeholder="Buscar personas..." value="{{ request('q') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($personas as $persona)
                                    <tr>
                                        <td>{{ $persona->persona_id ?? $persona->id }}</td>
                                        <td>
                                            @if(!empty($persona->foto_path))
                                                <img src="{{ asset('storage/'.$persona->foto_path) }}" alt="foto" style="width:40px;height:40px;object-fit:cover;border-radius:4px;">
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $persona->nombres }} {{ $persona->apellidos }}</td>
                                        <td>{{ $persona->email }}</td>
                                        <td>{{ $persona->telefono }}</td>
                                        <td>
                                            <a href="{{ route('personas.show', $persona->persona_id ?? $persona->id) }}" class="btn btn-sm btn-outline-primary">Ver</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            <p class="text-muted">No hay investigadores registrados aún.</p>
                                            <a href="{{ route('personas.create') }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-person-plus"></i> Crear primer investigador
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-3">{{ $personas->appends(request()->query())->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection