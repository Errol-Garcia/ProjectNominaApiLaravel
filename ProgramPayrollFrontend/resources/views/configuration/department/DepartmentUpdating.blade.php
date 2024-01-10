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
            </div>
        </div>
    </div>
    </div>
@endsection
