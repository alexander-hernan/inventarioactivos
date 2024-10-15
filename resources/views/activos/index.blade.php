@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Activos</h2>
        <a href="{{ route('activos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Activo</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nombre</th>
                <th>Tipo de Adquisición</th>
                <th>Fecha de Adquisición</th>
                <th>Vida Útil</th>
                <th>Ubicación</th>
                <th>Empleado</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($activos as $activo)
            <tr>
                <td>{{ $activo->id_activo }}</td>
                <td>{{ $activo->nombre }}</td>
                <td>{{ $activo->tipo_adquisicion }}</td>
                <td>{{ $activo->fecha_adquisicion }}</td>
                <td>{{ $activo->vida_util }}</td>
                <td>{{ $activo->ubicacion->nombre_ubicacion }}</td>
                <td>{{ $activo->empleado->nombre_empleado }} {{ $activo->empleado->apellido_empleado }}</td>
                <td>
                    <form action="{{ route('activos.destroy', $activo->id_activo) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('activos.show', $activo->id_activo) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('activos.edit', $activo->id_activo) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este activo?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection