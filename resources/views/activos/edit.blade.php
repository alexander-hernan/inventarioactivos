@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Activo</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('activos.update', $activo->id_activo) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $activo->nombre }}" required>
            </div>
            
            <div class="form-group">
                <label for="tipo_adquisicion">Tipo de Adquisición:</label>
                <input type="text" class="form-control" id="tipo_adquisicion" name="tipo_adquisicion" value="{{ $activo->tipo_adquisicion }}" required>
            </div>
            
            <div class="form-group">
                <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                <input type="date" class="form-control" id="fecha_adquisicion" name="fecha_adquisicion" value="{{ $activo->fecha_adquisicion }}" required>
            </div>
            
            <div class="form-group">
                <label for="vida_util">Vida Útil (en años):</label>
                <input type="number" class="form-control" id="vida_util" name="vida_util" value="{{ $activo->vida_util }}" required>
            </div>
            
            <div class="form-group">
                <label for="id_ubicacion">Ubicación:</label>
                <select class="form-control" id="id_ubicacion" name="id_ubicacion" required>
                    @foreach($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->id_ubicacion }}" {{ $activo->id_ubicacion == $ubicacion->id_ubicacion ? 'selected' : '' }}>
                            {{ $ubicacion->nombre_ubicacion }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_empleado">Empleado:</label>
                <select class="form-control" id="id_empleado" name="id_empleado" required>
                    @foreach($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}" {{ $activo->id_empleado == $empleado->id_empleado ? 'selected' : '' }}>
                            {{ $empleado->nombre_empleado }} {{ $empleado->apellido_empleado }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('activos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection