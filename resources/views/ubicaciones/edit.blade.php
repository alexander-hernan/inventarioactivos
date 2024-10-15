@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Ubicación</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('ubicaciones.update', $ubicacion->id_ubicacion) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre_ubicacion">Nombre:</label>
                <input type="text" class="form-control" id="nombre_ubicacion" name="nombre_ubicacion" value="{{ $ubicacion->nombre_ubicacion }}" required>
            </div>
            
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $ubicacion->direccion }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('ubicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection