@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crear Nuevo Mantenimiento</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('mantenimientos.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="fecha_mantenimiento">Fecha de Mantenimiento:</label>
                <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento" required>
            </div>
            
            <div class="form-group">
                <label for="tipo_mantenimiento">Tipo de Mantenimiento:</label>
                <input type="text" class="form-control" id="tipo_mantenimiento" name="tipo_mantenimiento" required>
            </div>
            
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
            </div>
            
            <div class="form-group">
                <label for="costo_mantenimiento">Costo:</label>
                <input type="number" step="0.01" class="form-control" id="costo_mantenimiento" name="costo_mantenimiento" value="{{ $mantenimiento->costo_mantenimiento ?? old('costo_mantenimiento') }}" required>
            </div>
            
            <div class="form-group">
                <label for="id_activo">Activo:</label>
                <select class="form-control" id="id_activo" name="id_activo" required>
                    @foreach($activos as $activo)
                        <option value="{{ $activo->id_activo }}">{{ $activo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="id_proveedor">Proveedor:</label>
                <select class="form-control" id="id_proveedor" name="id_proveedor" required>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}" {{ isset($mantenimiento) && $mantenimiento->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
                            {{ $proveedor->nombre_proveedor }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection