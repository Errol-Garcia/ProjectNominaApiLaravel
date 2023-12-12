@extends('TemplateAdmin')
@section('content')
    <div class="container-fluid">
        <div class="row center py-3">
            <div class="col-6 ">
                <div>
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registrado</strong> se agrego con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                ?>
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                ?>
                </div>
                <div class="card" style="width: 50rem;">
                    <div class="card-header">
                        Registro de empleado
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('employee.store') }}" method="POST">
                            @include('configuration.employee.EmployeeForm')
                            <br>
                            <button type="submit" class="btn btn-primary center">Crear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
