@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido al Sistema de Gestión de Activos') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Módulos disponibles:</h2>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('ubicaciones.index') }}">Gestión de Ubicaciones</a></li>
                        <li class="list-group-item"><a href="{{ route('departamentos.index') }}">Gestión de Departamentos</a></li>
                        <li class="list-group-item"><a href="{{ route('empleados.index') }}">Gestión de Empleados</a></li>
                        <li class="list-group-item"><a href="{{ route('activos.index') }}">Gestión de Activos</a></li>
                        <li class="list-group-item"><a href="{{ route('disposiciones.index') }}">Gestión de Disposiciones</a></li>
                        <li class="list-group-item"><a href="{{ route('proveedores.index') }}">Gestión de Proveedores</a></li>
                        <li class="list-group-item"><a href="{{ route('mantenimientos.index') }}">Gestión de Mantenimientos</a></li>
                        <li class="list-group-item"><a href="{{ route('depreciaciones.index') }}">Gestión de Depreciaciones</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection