@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Departamentos</h2>
        <a href="{{ route('departamentos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Departamento</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nombre</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($departamentos as $departamento)
            <tr>
                <td>{{ $departamento->id_departamento }}</td>
                <td>{{ $departamento->nombre_departamento }}</td>
                <td>
                    <form action="{{ route('departamentos.destroy', $departamento->id_departamento) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('departamentos.show', $departamento->id_departamento) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('departamentos.edit', $departamento->id_departamento) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este departamento?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection