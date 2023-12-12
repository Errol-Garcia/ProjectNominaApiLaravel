<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Nomina seminario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/bootstrap.css') }}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/miStylos.css') }}'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/grafica.css') }}'>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/accessibility.js') }}"></script>
    <script src="{{ asset('js/exporting.js') }}"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
</head>

<body>
    <div class="row nav-img">
        <img src="{{ asset('img/logo.png') }}" id="imgPrincipal" width="30" height="150">
        <h1>SISTEMA DE NOMINA</h1>
    </div>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav navbar-dark navbar-expand-lg">
                        <li class="nav-item dropdown conten-dropdown">
                            <a class="nav-link dropdown-toggle conten-perfil" href="#" id="navbarDarkDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle perfil">&nbsp; </i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Salir</button>

                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('logPayroll.index') }}">Historial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('estadistica') }}">
                                Estadistica</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Configuracion
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('accrued.index') }}">Devengado</a></li>
                                <li><a class="dropdown-item" href="{{ route('discount.index') }}">Descuento</a></li>
                                <li><a class="dropdown-item" href="{{ route('post.index') }}">Cargo</a></li>
                                <li><a class="dropdown-item" href="{{ route('department.index') }}">Departamento</a></li>

                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Empleado
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('employee.index') }}">Listado empleados</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('PayrollPartial') }}">Registrar nomina</a></li>
                                <li><a class="dropdown-item" href="{{ route('payroll.index') }}">Lista nomina</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')
</body>
