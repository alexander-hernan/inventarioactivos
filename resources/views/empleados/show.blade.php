@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Empleado</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $empleado->nombre_empleado }} {{ $empleado->apellido_empleado }}</h5>
                <p class="card-text"><strong>Cargo:</strong> {{ $empleado->cargo_empleado }}</p>
                <p class="card-text"><strong>Departamento:</strong> {{ $empleado->departamento->nombre_departamento }}</p>
                <p class="card-text"><strong>Usuario:</strong> {{ $empleado->usuario->nombre_usuario }}</p>
            </div>
        </div>
        
        <a href="{{ route('empleados.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection