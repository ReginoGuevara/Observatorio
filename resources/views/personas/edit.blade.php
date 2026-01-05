@extends('layouts.app')

@section('title', 'Editar Investigador')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="bi bi-pencil-square"></i> Editar Investigador</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('personas.update', $persona->persona_id ?? $persona->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre completo *</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                                   id="nombre" name="nombre" value="{{ old('nombre', $persona->nombres . ' ' . $persona->apellidos) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email', $persona->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" 
                                   value="{{ old('telefono', $persona->telefono) }}">
                        </div>

                        <div class="mb-3">
                            <label for="cargo" class="form-label">Cargo/Posición</label>
                            <input type="text" class="form-control" id="cargo" name="cargo" 
                                   value="{{ old('cargo', $persona->cargo) }}">
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                            @if(!empty($persona->foto_path))
                                <div class="mt-2">
                                    <img src="{{ asset('storage/'.$persona->foto_path) }}" alt="foto" style="width:80px;height:80px;object-fit:cover;border-radius:4px;">
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('personas.index') }}" class="btn btn-secondary">
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
