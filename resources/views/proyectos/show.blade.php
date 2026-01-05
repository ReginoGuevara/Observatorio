@extends('layouts.app')

@section('title', 'Ver Proyecto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4><i class="bi bi-folder2-open"></i> Proyecto: {{ $proyecto->nombre }}</h4>
                    <div>
                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                        <a href="{{ route('proyectos.index') }}" class="btn btn-sm btn-secondary">Volver</a>
                    </div>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID</dt>
                        <dd class="col-sm-9">{{ $proyecto->id }}</dd>

                        <dt class="col-sm-3">Nombre</dt>
                        <dd class="col-sm-9">{{ $proyecto->nombre }}</dd>

                        <dt class="col-sm-3">Descripción</dt>
                        <dd class="col-sm-9">{{ $proyecto->descripcion }}</dd>

                        <dt class="col-sm-3">Fecha inicio</dt>
                        <dd class="col-sm-9">{{ $proyecto->fecha_de_inicio }}</dd>

                        <dt class="col-sm-3">Fecha fin</dt>
                        <dd class="col-sm-9">{{ $proyecto->fecha_finalizacion }}</dd>

                        <dt class="col-sm-3">Estado</dt>
                        <dd class="col-sm-9">{{ $proyecto->estado }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
