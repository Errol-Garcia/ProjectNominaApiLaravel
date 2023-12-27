@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row centrar py-5">
            <div class="col-5 " style="padding-bottom:500px;">
                <form action="{{ route('department.update', $department['id']) }}" method="POST">
                    @method('PUT')
                    @include('configuration.department.DepartmentForm')
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
