@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nuevo Departamento</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('departamentos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nombre_departamento">Nombre:</label>
                <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection