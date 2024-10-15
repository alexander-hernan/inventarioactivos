<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Activos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            padding-top: 5rem;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="{{ url('/home') }}">Gestión de Activos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('disposiciones.index') }}">Disposiciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class ="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mas opciones</a>
                    <div class="dropdown-menu" aria-labelledby="navbardropdown">
                    <a class="dropdown-item" href="{{ route('ubicaciones.index') }}">Ubicaciones</a>
                    <a class="dropdown-item" href="{{ route('departamentos.index') }}">Departamentos</a>
                    <a class="dropdown-item" href="{{ route('activos.index') }}">Activos</a>
                    <a class="dropdown-item" href="{{ route('proveedores.index') }}">Proveedores</a>
                    <a class="dropdown-item" href="{{ route('mantenimientos.index') }}">Mantenimientos</a>
                    <a class="dropdown-item" href="{{ route('depreciaciones.index') }}">Depreciaciones</a>
                    </div>
            
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @guest

                <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">iniciar sesion</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->nombre_usuario }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    

    <main class="py-4 flex-grow-1">
    @yield('content')
</main>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
