@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Disposición</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('disposiciones.update', $disposicion->id_disposicion) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="fecha_disposicion">Fecha de Disposición:</label>
                <input type="date" class="form-control" id="fecha_disposicion" name="fecha_disposicion" value="{{ $disposicion->fecha_disposicion }}" required>
            </div>
            
            <div class="form-group">
                <label for="tipo_disposicion">Tipo de Disposición:</label>
                <input type="text" class="form-control" id="tipo_disposicion" name="tipo_disposicion" value="{{ $disposicion->tipo_disposicion }}" required>
            </div>
            
            <div class="form-group">
                <label for="valor_disposicion">Valor de Disposición:</label>
                <input type="number" step="0.01" class="form-control" id="valor_disposicion" name="valor_disposicion" value="{{ $disposicion->valor_disposicion }}" required>
            </div>
            
            <div class="form-group">
                <label for="id_activo">Activo:</label>
                <select class="form-control" id="id_activo" name="id_activo" required>
                    @foreach($activos as $activo)
                        <option value="{{ $activo->id_activo }}" {{ $disposicion->id_activo == $activo->id_activo ? 'selected' : '' }}>
                            {{ $activo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('disposiciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection