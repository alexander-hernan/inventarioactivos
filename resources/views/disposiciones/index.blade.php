@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Disposiciones</h2>
        <a href="{{ route('disposiciones.create') }}" class="btn btn-primary mb-3">Crear Nueva Disposición</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Activo</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($disposiciones as $disposicion)
            <tr>
                <td>{{ $disposicion->id_disposicion }}</td>
                <td>{{ $disposicion->fecha_disposicion }}</td>
                <td>{{ $disposicion->tipo_disposicion }}</td>
                <td>{{ $disposicion->valor_disposicion }}</td>
                <td>{{ $disposicion->activo->nombre ?? 'N/A' }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('disposiciones.show', $disposicion->id_disposicion) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('disposiciones.edit', $disposicion->id_disposicion) }}">Editar</a>
                    <form action="{{ route('disposiciones.destroy', $disposicion->id_disposicion) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta disposición?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection