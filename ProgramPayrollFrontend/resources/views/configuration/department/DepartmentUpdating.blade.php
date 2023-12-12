@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row centrar py-5">
            <div class="col-5 " style="padding-bottom:500px;">
                <form action="{{ route('department.update', $department) }}" method="POST">
                    @method('PUT')
                    @include('configuration.department.DepartmentForm')
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                {{-- <div class="my-4">
                    <?php
                    //if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registrado</strong> se agrego con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    //}
                    ?>

                    <?php
                    //if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    //}
                    ?>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
