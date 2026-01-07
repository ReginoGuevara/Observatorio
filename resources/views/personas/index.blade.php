@extends('layouts.app')

@section('title', 'Reportes de Investigadores')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h1 class="mb-2" style="font-size: 2.5rem; font-weight: 800; color: #1a202c;">
                        <i class="bi bi-people" style="color: #5a67d8;"></i> Reportes de Investigadores
                    </h1>
                    <p class="text-muted" style="font-size: 1rem;">Gestiona el perfil de todos tus investigadores</p>
                </div>
                <a href="{{ route('personas.create') }}" class="btn btn-primary" style="padding: 12px 28px; border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-person-plus me-2"></i> Nuevo Investigador
                </a>
            </div>

            <div class="card border-0" style="box-shadow: 0 4px 20px rgba(99, 102, 241, 0.08);">
                <div class="card-header" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                    <div class="row align-items-center g-3">
                        <div class="col-md-8">
                            <form method="GET" action="{{ route('personas.index') }}" class="w-100">
                                <div class="input-group" style="border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                                    <span class="input-group-text bg-white border-0"><i class="bi bi-search" style="color: #94a3b8;"></i></span>
                                    <input type="search" name="q" class="form-control border-0" placeholder="Buscar por nombre, email o teléfono..." value="{{ request('q') }}" style="font-size: 0.95rem;">
                                    <button class="btn btn-outline-secondary" type="submit" style="border-left: 1px solid #e2e8f0;">
                                        <i class="bi bi-search me-1"></i> Buscar
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" style="border-radius: 8px 0 0 8px;">
                                    <i class="bi bi-file-earmark-arrow-down me-1"></i> Exportar
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="border-radius: 10px; box-shadow: 0 8px 24px rgba(0,0,0,0.12);">
                                    <li><a class="dropdown-item" href="{{ route('personas.export-csv') }}"><i class="bi bi-file-csv me-2"></i> Exportar CSV</a></li>
                                    <li><a class="dropdown-item" href="{{ route('personas.export-pdf') }}"><i class="bi bi-file-pdf me-2"></i> Exportar PDF</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#" onclick="window.print(); return false;"><i class="bi bi-printer me-2"></i> Imprimir</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show m-4" role="alert">
                            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show m-4" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 8%;">ID</th>
                                    <th style="width: 10%;">Foto</th>
                                    <th style="width: 22%;">Nombre</th>
                                    <th style="width: 20%;">Email</th>
                                    <th style="width: 15%;">Teléfono</th>
                                    <th style="width: 25%; text-align: right;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($personas as $persona)
                                    <tr>
                                        <td><strong>#{{ $persona->persona_id }}</strong></td>
                                        <td>
                                            @if(!empty($persona->foto_path))
                                                <img src="{{ asset('storage/'.$persona->foto_path) }}" alt="foto" class="rounded-circle" style="width: 48px; height: 48px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.12);">
                                            @else
                                                <div class="bg-light text-center rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 48px; height: 48px; color: #94a3b8; font-size: 1.2rem;">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            @endif
                                        </td>
                                        <td><strong>{{ $persona->nombres }} {{ $persona->apellidos }}</strong></td>
                                        <td>
                                            <a href="mailto:{{ $persona->email }}" style="color: #6366f1; text-decoration: none;">
                                                <i class="bi bi-envelope me-1"></i>{{ $persona->email }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($persona->telefono)
                                                <i class="bi bi-telephone me-1"></i>{{ $persona->telefono }}
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td style="text-align: right;">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('personas.show', $persona->persona_id) }}" class="btn btn-outline-primary" title="Ver detalles">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('personas.edit', $persona->persona_id) }}" class="btn btn-outline-secondary" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger" title="Eliminar" onclick="confirmarEliminacion({{ $persona->persona_id }}, '{{ $persona->nombres }} {{ $persona->apellidos }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5">
                                            <i class="bi bi-inbox" style="font-size: 3rem; color: #cbd5e1;"></i>
                                            <p class="text-muted mt-3 mb-3">No hay investigadores registrados aún.</p>
                                            <a href="{{ route('personas.create') }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-person-plus me-1"></i> Crear primer investigador
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($personas->total() > 0)
                        <div class="p-4 border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted" style="font-size: 0.9rem;">
                                    Mostrando {{ $personas->firstItem() }} a {{ $personas->lastItem() }} de {{ $personas->total() }} investigadores
                                </span>
                                {{ $personas->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulario oculto para eliminar -->
<form id="deleteForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmarEliminacion(id, nombre) {
    if (confirm(`¿Eliminar investigador "${nombre}"? Esta acción no se puede deshacer.`)) {
        const form = document.getElementById('deleteForm');
        form.action = "{{ route('personas.destroy', ':id') }}".replace(':id', id);
        form.submit();
    }
}
</script>
@endsection