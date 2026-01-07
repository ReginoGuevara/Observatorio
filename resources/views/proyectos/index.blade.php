@extends('layouts.app')

@section('title', 'Reportes de Proyectos')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h1 class="mb-2" style="font-size: 2.5rem; font-weight: 800; color: #1a202c;">
                        <i class="bi bi-folder2-open" style="color: #5a67d8;"></i> Reportes de Proyectos
                    </h1>
                    <p class="text-muted" style="font-size: 1rem;">Gestiona y monitorea tus proyectos de investigación</p>
                </div>
                <a href="{{ route('proyectos.create') }}" class="btn btn-primary" style="padding: 12px 28px; border-radius: 10px; font-weight: 600;">
                    <i class="bi bi-plus-circle me-2"></i> Nuevo Proyecto
                </a>
            </div>

            <div class="card border-0" style="box-shadow: 0 4px 20px rgba(99, 102, 241, 0.08);">
                <div class="card-header" style="background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <form method="GET" action="{{ route('proyectos.index') }}" class="w-100">
                                <div class="input-group" style="border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.06);">
                                    <span class="input-group-text bg-white border-0"><i class="bi bi-search" style="color: #94a3b8;"></i></span>
                                    <input type="search" name="q" class="form-control border-0" placeholder="Buscar por nombre o descripción..." value="{{ request('q') }}" style="font-size: 0.95rem;">
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
                                    <li><a class="dropdown-item" href="{{ route('proyectos.export-csv') }}"><i class="bi bi-file-csv me-2"></i> Exportar CSV</a></li>
                                    <li><a class="dropdown-item" href="{{ route('proyectos.export-pdf') }}"><i class="bi bi-file-pdf me-2"></i> Exportar PDF</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#" onclick="window.print(); return false;"><i class="bi bi-printer me-2"></i> Imprimir</a></li>
                                </ul>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary ms-2" type="button" data-bs-toggle="modal" data-bs-target="#filterModal" style="border-radius: 0 8px 8px 0;">
                                <i class="bi bi-funnel me-1"></i> Filtros
                            </button>
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

                    <!-- Modal de filtros -->
                    <div class="modal fade" id="filterModal" tabindex="-1">
                        <div class="modal-dialog modal-sm modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><i class="bi bi-funnel me-2"></i> Filtrar Proyectos</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="GET" action="{{ route('proyectos.index') }}">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label" style="font-weight: 600; color: #0f172a;">Estado</label>
                                            <select name="estado" class="form-select">
                                                <option value="">Todos los estados</option>
                                                <option value="Activo" {{ request('estado')=='Activo'?'selected':'' }}>Activo</option>
                                                <option value="Finalizado" {{ request('estado')=='Finalizado'?'selected':'' }}>Finalizado</option>
                                                <option value="En revisión" {{ request('estado')=='En revisión'?'selected':'' }}>En revisión</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" style="font-weight: 600; color: #0f172a;">Desde</label>
                                            <input type="date" name="desde" class="form-control" value="{{ request('desde') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" style="font-weight: 600; color: #0f172a;">Hasta</label>
                                            <input type="date" name="hasta" class="form-control" value="{{ request('hasta') }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">ID</th>
                                    <th style="width: 25%;">Nombre</th>
                                    <th style="width: 30%;">Descripción</th>
                                    <th style="width: 15%;">Estado</th>
                                    <th style="width: 20%; text-align: right;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($proyectos as $proyecto)
                                    <tr>
                                        <td><strong>#{{ $proyecto->id }}</strong></td>
                                        <td><strong>{{ $proyecto->nombre }}</strong></td>
                                        <td>{{ \Illuminate\Support\Str::limit($proyecto->descripcion, 60) }}</td>
                                        <td>
                                            @if(strtolower($proyecto->estado) === 'activo' || strtolower($proyecto->estado) === 'en curso')
                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> {{ $proyecto->estado }}</span>
                                            @elseif(strtolower($proyecto->estado) === 'finalizado')
                                                <span class="badge bg-secondary"><i class="bi bi-check2-all me-1"></i> {{ $proyecto->estado }}</span>
                                            @else
                                                <span class="badge bg-warning"><i class="bi bi-exclamation-circle me-1"></i> {{ $proyecto->estado }}</span>
                                            @endif
                                        </td>
                                        <td style="text-align: right;">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('proyectos.show', $proyecto->id) }}" class="btn btn-outline-primary" title="Ver detalles">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-outline-secondary" title="Editar">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <button type="button" class="btn btn-outline-danger" title="Eliminar" onclick="confirmarEliminacion({{ $proyecto->id }}, '{{ $proyecto->nombre }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <i class="bi bi-inbox" style="font-size: 3rem; color: #cbd5e1;"></i>
                                            <p class="text-muted mt-3 mb-3">No hay proyectos registrados aún.</p>
                                            <a href="{{ route('proyectos.create') }}" class="btn btn-primary btn-sm">
                                                <i class="bi bi-plus-circle me-1"></i> Crear primer proyecto
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($proyectos->total() > 0)
                        <div class="p-4 border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted" style="font-size: 0.9rem;">
                                    Mostrando {{ $proyectos->firstItem() }} a {{ $proyectos->lastItem() }} de {{ $proyectos->total() }} proyectos
                                </span>
                                {{ $proyectos->appends(request()->query())->links() }}
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
    if (confirm(`¿Eliminar proyecto "${nombre}"? Esta acción no se puede deshacer.`)) {
        const form = document.getElementById('deleteForm');
        form.action = "{{ route('proyectos.destroy', ':id') }}".replace(':id', id);
        form.submit();
    }
}
</script>
@endsection