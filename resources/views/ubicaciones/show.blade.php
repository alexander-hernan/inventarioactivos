@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles de la Ubicación</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $ubicacion->nombre_ubicacion }}</h5>
                <p class="card-text"><strong>Dirección:</strong> {{ $ubicacion->direccion }}</p>
            </div>
        </div>
        
        <a href="{{ route('ubicaciones.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection