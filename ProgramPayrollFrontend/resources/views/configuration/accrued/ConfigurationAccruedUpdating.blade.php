@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row center py-2">
            <div class="col-3">
                <form action="{{ route('accrued.update', $accrued['id']) }}" method="POST">
                    @method('PUT')
                    @include('configuration.accrued.ConfigurationAccruedForm')
                    <br>
                    <div class="center">
                        <button class="btn btn-primary" type="submit">Actualizar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
