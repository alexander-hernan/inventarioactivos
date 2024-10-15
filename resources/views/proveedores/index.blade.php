@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Proveedores</h2>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary mb-3">Crear Nuevo Proveedor</a>
        
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
                <th>Teléfono</th>
                <th>Email</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->id_proveedor }}</td>
                <td>{{ $proveedor->nombre_proveedor }}</td>
                <td>{{ $proveedor->direccion_proveedor }}</td>
                <td>{{ $proveedor->telefono_proveedor }}</td>
                <td>{{ $proveedor->email_proveedor }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('proveedores.show', $proveedor->id_proveedor) }}">Ver</a>
                    <a class="btn btn-primary" href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}">Editar</a>
                    <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este proveedor?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection