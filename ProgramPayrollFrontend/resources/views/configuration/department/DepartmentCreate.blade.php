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
            </div>
        </div>
    </div>
@endsection
