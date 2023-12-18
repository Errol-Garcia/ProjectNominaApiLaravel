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
                        <strong>Registrado</strong> se agrego con exito...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                ?>
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                ?>
                </div>
                <div class="card" style="width: 40rem;">
                    <div class="card-header">
                        Editar Empleado
                    </div>
                    <div class="card-body ">

                        <form action="{{ route('employee.update', $employee['id']) }}" method="POST">

                            @method('PUT')
                            @include('configuration.employee.EmployeeForm')
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit"> Actualizar </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
