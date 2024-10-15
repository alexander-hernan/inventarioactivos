@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Empleados</h2>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary mb-3">Crear Nuevo Empleado</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Usuario</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id_empleado }}</td>
                <td>{{ $empleado->nombre_empleado }}</td>
                <td>{{ $empleado->apellido_empleado }}</td>
                <td>{{ $empleado->cargo_empleado }}</td>
                <td>{{ $empleado->departamento->nombre_departamento }}</td>
                <td>{{ $empleado->usuario->nombre_usuario }}</td>
                <td>
                    <form action="{{ route('empleados.destroy', $empleado->id_empleado) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('empleados.show', $empleado->id_empleado) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('empleados.edit', $empleado->id_empleado) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este empleado?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection