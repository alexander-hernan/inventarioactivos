@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Depreciaciones</h2>
        <a href="{{ route('depreciaciones.create') }}" class="btn btn-primary mb-3">Crear Nueva Depreciación</a>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Año</th>
                <th>Valor</th>
                <th>Activo</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($depreciaciones as $depreciacion)
            <tr>
                <td>{{ $depreciacion->id_depreciacion }}</td>
                <td>{{ $depreciacion->año }}</td>
                <td>{{ $depreciacion->valor_depreciacion }}</td>
                <td>{{ $depreciacion->activo->nombre }}</td>
                <td>
                    <form action="{{ route('depreciaciones.destroy',$depreciacion->id_depreciacion) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('depreciaciones.show',$depreciacion->id_depreciacion) }}">Ver</a>
                        <a class="btn btn-primary" href="{{ route('depreciaciones.edit',$depreciacion->id_depreciacion) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection