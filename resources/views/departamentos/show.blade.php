@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalles del Departamento</h2>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $departamento->nombre_departamento }}</h5>
            </div>
        </div>
        
        <a href="{{ route('departamentos.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
@endsection