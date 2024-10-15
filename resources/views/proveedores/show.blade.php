@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Proveedor</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $proveedor->nombre_proveedor }}</h5>
                <p class="card-text"><strong>Dirección:</strong> {{ $proveedor->direccion_proveedor }}</p>
                <p class="card-text"><strong>Teléfono:</strong> {{ $proveedor->telefono_proveedor }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $proveedor->email_proveedor }}</p>
            </div>
        </div>
        
        <a href="{{ route('proveedores.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection