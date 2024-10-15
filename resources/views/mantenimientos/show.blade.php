@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Mantenimiento</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mantenimiento #{{ $mantenimiento->id_mantenimiento }}</h5>
                <p class="card-text"><strong>Fecha:</strong> {{ $mantenimiento->fecha_mantenimiento }}</p>
                <p class="card-text"><strong>Tipo:</strong> {{ $mantenimiento->tipo_mantenimiento }}</p>
                <p class="card-text"><strong>Descripción:</strong> {{ $mantenimiento->descripcion }}</p>
                <p class="card-text"><strong>Costo:</strong> {{ $mantenimiento->costo_mantenimiento }}</p>
                <p class="card-text"><strong>Activo:</strong> {{ $mantenimiento->activo->nombre }}</p>
                <p class="card-text"><strong>Proveedor:</strong> {{ $mantenimiento->proveedor->nombre_proveedor }}</p>
            </div>
        </div>
        
        <a href="{{ route('mantenimientos.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection