@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Activo</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $activo->nombre }}</h5>
                <p class="card-text"><strong>Tipo de Adquisición:</strong> {{ $activo->tipo_adquisicion }}</p>
                <p class="card-text"><strong>Fecha de Adquisición:</strong> {{ $activo->fecha_adquisicion }}</p>
                <p class="card-text"><strong>Vida Útil:</strong> {{ $activo->vida_util }} años</p>
                <p class="card-text"><strong>Ubicación:</strong> {{ $activo->ubicacion->nombre_ubicacion }}</p>
                <p class="card-text"><strong>Empleado Asignado:</strong> {{ $activo->empleado->nombre_empleado }} {{ $activo->empleado->apellido_empleado }}</p>
            </div>
        </div>
        
        <a href="{{ route('activos.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection