@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ubicaciones</h2>
        <a href="{{ route('ubicaciones.create') }}" class="btn btn-primary mb-3">Crear Nueva Ubicación</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($ubicaciones as $ubicacion)
            <tr>
                <td>{{ $ubicacion->id_ubicacion }}</td>
                <td>{{ $ubicacion->nombre_ubicacion }}</td>
                <td>{{ $ubicacion->direccion }}</td>
                <td>
                    <form action="{{ route('ubicaciones.destroy', $ubicacion->id_ubicacion) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('ubicaciones.show', $ubicacion->id_ubicacion) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('ubicaciones.edit', $ubicacion->id_ubicacion) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta ubicación?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection