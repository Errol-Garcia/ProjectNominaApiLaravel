<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/miStylos.css') }}">
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>

    <title>Login</title>
</head>

<body class="fondo">
    <div class="container-fluid">
        <div class="row centrar">
            <div class="col-xxl-4 col-xl-3 col-lg-4 col-md-5 col-sm-6 col-xs-6 col-9">
                <div class="my-4">
                    <?php
                        if(isset($mensaje) and $mensaje=='Autenticación incorrecta'){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Contraseña o correo incorrecto</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                        }
                    ?>
                </div>
                @yield('content')
            </div>
        </div>

    </div>
</body>

</html>
