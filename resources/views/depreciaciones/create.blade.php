@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nueva Depreciación</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('depreciaciones.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="año">Año:</label>
                <input type="number" class="form-control" id="año" name="año" required>
            </div>
            
            <div class="form-group">
                <label for="valor_depreciacion">Valor de Depreciación:</label>
                <input type="number" step="0.01" class="form-control" id="valor_depreciacion" name="valor_depreciacion" required>
            </div>
            
            <div class="form-group">
                <label for="id_activo">Activo:</label>
                <select class="form-control" id="id_activo" name="id_activo" required>
                    @foreach($activos as $activo)
                        <option value="{{ $activo->id_activo }}">{{ $activo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('depreciaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection