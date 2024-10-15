@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles de la Disposición</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Disposición #{{ $disposicion->id_disposicion }}</h5>
                <p class="card-text"><strong>Fecha de Disposición:</strong> {{ $disposicion->fecha_disposicion }}</p>
                <p class="card-text"><strong>Tipo de Disposición:</strong> {{ $disposicion->tipo_disposicion }}</p>
                <p class="card-text"><strong>Valor de Disposición:</strong> {{ $disposicion->valor_disposicion }}</p>
                <p class="card-text"><strong>Activo:</strong> {{ $disposicion->activo->nombre ?? 'N/A' }}</p>
            </div>
        </div>
        
        <a href="{{ route('disposiciones.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection