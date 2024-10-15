@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Ubicación</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('ubicaciones.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nombre_ubicacion">Nombre de la Ubicación</label>
                <input type="text" class="form-control @error('nombre_ubicacion') is-invalid @enderror" id="nombre_ubicacion" name="nombre_ubicacion" value="{{ old('nombre_ubicacion') }}" required>
                @error('nombre_ubicacion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
