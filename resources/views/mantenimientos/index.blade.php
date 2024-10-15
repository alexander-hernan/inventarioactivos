@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mantenimientos</h2>
        <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Mantenimiento</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Activo</th>
                <th>Proveedor</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($mantenimientos as $mantenimiento)
            <tr>
                <td>{{ $mantenimiento->id_mantenimiento }}</td>
                <td>{{ $mantenimiento->fecha_mantenimiento }}</td>
                <td>{{ $mantenimiento->tipo_mantenimiento }}</td>
                <td>{{ $mantenimiento->descripcion }}</td>
                <td>{{ $mantenimiento->costo_mantenimiento }}</td>
                <td>{{ $mantenimiento->activo->nombre }}</td>
                <td>{{ $mantenimiento->proveedor->nombre_proveedor }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('mantenimientos.show', $mantenimiento->id_mantenimiento) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('mantenimientos.edit', $mantenimiento->id_mantenimiento) }}">Editar</a>
                    <form action="{{ route('mantenimientos.destroy', $mantenimiento->id_mantenimiento) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este mantenimiento?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection