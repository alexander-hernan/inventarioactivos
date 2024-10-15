@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nuevo Activo</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('activos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            
            <div class="form-group">
                <label for="tipo_adquisicion">Tipo de Adquisición:</label>
                <input type="text" class="form-control" id="tipo_adquisicion" name="tipo_adquisicion" required>
            </div>
            
            <div class="form-group">
                <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" required>
            </div>
            
            <div class="form-group">
                <label for="vida_util">Vida Útil (en años):</label>
                <input type="number" class="form-control" id="vida_util" name="vida_util" required>
            </div>
            
            <div class="form-group">
                <label for="id_ubicacion">Ubicación:</label>
                <select class="form-control" id="id_ubicacion" name="id_ubicacion" required>
                    @foreach($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->id_ubicacion }}">{{ $ubicacion->nombre_ubicacion }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_empleado">Empleado:</label>
                <select class="form-control" id="id_empleado" name="id_empleado" required>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}">{{ $empleado->nombre_empleado }} {{ $empleado->apellido_empleado }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('activos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection