@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Departamento</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('departamentos.update', $departamento->id_departamento) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre_departamento">Nombre:</label>
                <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" value="{{ $departamento->nombre_departamento }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection