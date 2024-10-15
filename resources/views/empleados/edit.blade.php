@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Empleado</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre_empleado">Nombre:</label>
                <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" value="{{ $empleado->nombre_empleado }}" required>
            </div>
            
            <div class="form-group">
                <label for="apellido_empleado">Apellido:</label>
                <input type="text" class="form-control" id="apellido_empleado" name="apellido_empleado" value="{{ $empleado->apellido_empleado }}" required>
            </div>
            
            <div class="form-group">
                <label for="cargo_empleado">Cargo:</label>
                <input type="text" class="form-control" id="cargo_empleado" name="cargo_empleado" value="{{ $empleado->cargo_empleado }}" required>
            </div>
            
            <div class="form-group">
                <label for="id_departamento">Departamento:</label>
                <select class="form-control" id="id_departamento" name="id_departamento" required>
                    @foreach($departamentos as $departamento)
                        <option value="{{ $departamento->id_departamento }}" {{ $empleado->id_departamento == $departamento->id_departamento ? 'selected' : '' }}>
                            {{ $departamento->nombre_departamento }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_usuario">Usuario:</label>
                <select class="form-control" id="id_usuario" name="id_usuario" required>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id_usuario }}" {{ $empleado->id_usuario == $usuario->id_usuario ? 'selected' : '' }}>
                            {{ $usuario->nombre_usuario }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection