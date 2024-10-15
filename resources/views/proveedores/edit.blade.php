@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Proveedor</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nombre_proveedor">Nombre:</label>
                <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $proveedor->nombre_proveedor }}" required>
            </div>
            
            <div class="form-group">
                <label for="direccion_proveedor">Dirección:</label>
                <input type="text" class="form-control" id="direccion_proveedor" name="direccion_proveedor" value="{{ $proveedor->direccion_proveedor }}" required>
            </div>
            
            <div class="form-group">
                <label for="telefono_proveedor">Teléfono:</label>
                <input type="text" class="form-control" id="telefono_proveedor" name="telefono_proveedor" value="{{ $proveedor->telefono_proveedor }}" required>
            </div>
            
            <div class="form-group">
                <label for="email_proveedor">Email:</label>
                <input type="email" class="form-control" id="email_proveedor" name="email_proveedor" value="{{ $proveedor->email_proveedor }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection