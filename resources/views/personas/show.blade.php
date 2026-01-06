@extends('layouts.app')

@section('title', 'Ver Investigador')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4><i class="bi bi-person"></i> {{ $persona->nombres }} {{ $persona->apellidos }}</h4>
                    <div>
                        <a href="{{ route('personas.edit', $persona->persona_id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <a href="{{ route('personas.index') }}" class="btn btn-sm btn-secondary">Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            @if(!empty($persona->foto_path))
                                <img src="{{ asset('storage/'.$persona->foto_path) }}" alt="foto" class="img-fluid">
                            @else
                                <div class="border p-3 text-center text-muted">Sin foto</div>
                            @endif
                        </div>
                        <div class="col-md-9">
                            <p><strong>Email:</strong> {{ $persona->email }}</p>
                            <p><strong>Teléfono:</strong> {{ $persona->telefono }}</p>
                            <p><strong>Cargo:</strong> {{ $persona->cargo }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
