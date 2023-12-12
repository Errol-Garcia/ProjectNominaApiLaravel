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

<body style="background-color: azure">
    <div class="row nav-img" >
        <img src="{{ asset('img/logo.png') }}" id="imgPrincipal" width="30" height="150">
        <h1>SISTEMA DE NOMINA</h1>
    </div>

    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav navbar-dark navbar-expand-lg">
                    <li class="nav-item dropdown conten-dropdown">
                        <a class="nav-link dropdown-toggle conten-perfil" href="#" id="navbarDarkDropdownMenuLink"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle perfil">&nbsp; </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    @yield('content')





</body>

