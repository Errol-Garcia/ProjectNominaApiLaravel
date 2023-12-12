@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row center py-5">
            <div class="col-5 ">
                <form action="{{ route('department.store') }}" method="POST">
                    @include('configuration.department.DepartmentForm')
                    <br>
                    <div class="center">
                        <button class="btn btn-primary" type="submit"> Crear </button>

                    </div>
                </form>
                {{-- <div class="my-4">
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
                </div> --}}
            </div>
        </div>
    </div>
@endsection
