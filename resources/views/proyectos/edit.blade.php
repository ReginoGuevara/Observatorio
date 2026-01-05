@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-pencil-square"></i> Editar Proyecto</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('proyectos.update', $proyecto->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Proyecto *</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" 
                                      rows="3">{{ old('descripcion', $proyecto->descripcion) }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                                <input type="date" class="form-control" id="fecha_inicio" 
                                       name="fecha_inicio" value="{{ old('fecha_inicio', $proyecto->fecha_de_inicio) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha_fin" class="form-label">Fecha de fin</label>
                                <input type="date" class="form-control" id="fecha_fin" 
                                       name="fecha_fin" value="{{ old('fecha_fin', $proyecto->fecha_finalizacion) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado">
                                <option value="planificacion" {{ old('estado', $proyecto->estado) == 'planificacion' ? 'selected' : '' }}>En planificación</option>
                                <option value="activo" {{ old('estado', $proyecto->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="completado" {{ old('estado', $proyecto->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
                                <option value="cancelado" {{ old('estado', $proyecto->estado) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
