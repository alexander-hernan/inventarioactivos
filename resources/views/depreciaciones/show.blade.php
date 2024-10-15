@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles de la Depreciación</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Depreciación #{{ $depreciacion->id_depreciacion }}</h5>
                <p class="card-text"><strong>Año:</strong> {{ $depreciacion->año }}</p>
                <p class="card-text"><strong>Valor:</strong> {{ $depreciacion->valor_depreciacion }}</p>
                <p class="card-text"><strong>Activo:</strong> {{ $depreciacion->activo->nombre }}</p>
            </div>
        </div>
        
        <a href="{{ route('depreciaciones.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection