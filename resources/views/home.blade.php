@extends('layouts.app')

@section('content')
<div class="home-container">
    <div class="content-wrapper">
        <div class="welcome-section">
            <h1>Bienvenido a nuestro Sistema</h1>
            <p>Gestione sus activos y recursos de manera eficiente</p>
        </div>
        <div class="features-section">
            <a href="{{ route('ubicaciones.index') }}" class="feature">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Ubicaciones</h3>
                <p>Gestione las ubicaciones de sus activos</p>
            </a>
            <a href="{{ route('empleados.index') }}" class="feature">
                <i class="fas fa-users"></i>
                <h3>Empleados</h3>
                <p>Administre la información de sus empleados</p>
            </a>
            <a href="{{ route('activos.index') }}" class="feature">
                <i class="fas fa-boxes"></i>
                <h3>Activos</h3>
                <p>Controle y supervise todos sus activos</p>
            </a>
            <a href="{{ route('mantenimientos.index') }}" class="feature">
                <i class="fas fa-tools"></i>
                <h3>Mantenimientos</h3>
                <p>Programe y realice seguimiento de mantenimientos</p>
            </a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .home-container {
        display: flex;
        flex-direction: column;
        min-height: calc(100vh - 56px); /* Ajusta este valor según la altura de tu menú */
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        overflow-y: auto;
    }
    .content-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-width: 1200px;
        width: 100%;
        margin: 0 auto;
    }
    .welcome-section {
        text-align: center;
        margin-bottom: 3rem;
    }
    .welcome-section h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    .welcome-section p {
        font-size: 1.2rem;
    }
    .features-section {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
    }
    .feature {
        flex: 1 1 200px;
        max-width: 250px;
        padding: 1.5rem;
        text-align: center;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        transition: transform 0.3s ease, background-color 0.3s ease;
        text-decoration: none;
        color: white !important;
    }
    .feature:hover {
        transform: translateY(-5px);
        background-color: rgba(255, 255, 255, 0.2);
    }
    .feature i {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    .feature h3 {
        margin-bottom: 0.5rem;
    }
    .feature:hover,
    .feature:hover h3,
    .feature:hover p,
    .feature:hover i {
        color: white !important;
    }
</style>
@endpush
