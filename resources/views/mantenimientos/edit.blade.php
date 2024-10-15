@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Mantenimiento</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!isset($mantenimiento))
            <div class="alert alert-danger">No se ha cargado el mantenimiento correctamente.</div>
        @else
            <form action="{{ route('mantenimientos.update', $mantenimiento->id_mantenimiento) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="fecha_mantenimiento">Fecha de Mantenimiento:</label>
                    <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento" value="{{ $mantenimiento->fecha_mantenimiento }}" required>
                </div>
                
                <div class="form-group">
                    <label for="tipo_mantenimiento">Tipo de Mantenimiento:</label>
                    <input type="text" class="form-control" id="tipo_mantenimiento" name="tipo_mantenimiento" value="{{ $mantenimiento->tipo_mantenimiento }}" required>
                </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $mantenimiento->descripcion }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="costo_mantenimiento">Costo:</label>
                    <input type="number" step="0.01" class="form-control" id="costo_mantenimiento" name="costo_mantenimiento" value="{{ $mantenimiento->costo_mantenimiento }}" required>
                </div>
                
                <div class="form-group">
                    <label for="id_activo">Activo:</label>
                    <select class="form-control" id="id_activo" name="id_activo" required>
                        @forelse($activos as $activo)
                            <option value="{{ $activo->id_activo }}" {{ $mantenimiento->id_activo == $activo->id_activo ? 'selected' : '' }}>
                                {{ $activo->nombre }}
                            </option>
                        @empty
                            <option value="">No hay activos disponibles</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="id_proveedor">Proveedor:</label>
                    <select class="form-control" id="id_proveedor" name="id_proveedor" required>
                        @forelse($proveedores as $proveedor)
                            <option value="{{ $proveedor->id_proveedor }}" {{ $mantenimiento->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
                                {{ $proveedor->nombre_proveedor }}
                            </option>
                        @empty
                            <option value="">No hay proveedores disponibles</option>
                        @endforelse
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        @endif
    </div>
@endsection