@extends('TemplateAdmin');
@section('content')
    <div class="container">
        <div class="row py-4">
            <div class="col-3">
                {{ $identification_card = '' }}
                <form action="{{ route('payroll.create') }}" method="GET">
                    @csrf
                    <div class="card" style="width: 17rem; ">
                        <div class="card-header">
                            Consulta Empleado
                        </div>
                        <div class="card-body card-flex mx-auto">

                            <input type="text" name="identification_card" placeholder="Cedula" class="form-control"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            <button type="submit" class="btn btn-primary btn-buscar" id="btn-buscar">Buscar</button>
                        </div>
                    </div>
                </form>
                <div class="my-4">
                    @if (isset($mensaje) && $mensaje == 'registrado')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Registrado</strong> se agrego con exito...
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-9">
                @if (isset($employee) && $employee != null)
                    @if (isset($salary) && $salary != null)
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Empleado</strong> ya tiene registrada la pre nomina...
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @else
                        <form action="{{ route('payroll.store') }}" method="POST">
                            @csrf
                            <div class="card mx-auto" style="width: 55rem;">
                                <div class="card-header">Empleados</div>
                                <div class="p-4">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Telefono</th>
                                                <th scope="col">sueldo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $employee['names'] }}</td>
                                                <td>{{ $employee['last_names'] }}</td>
                                                <td>{{ $employee['number_phone'] }}</td>
                                                <td>{{ $employee['salary'] }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><br>
                            <div class="card mx-auto" style="width: 55rem;">
                                <div class="card-header">Informacion correspondiente el mes laborado</div>
                                <div class="card-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <label for="worked_days" class="center py-2">Días trabajados:</label>
                                                    <input type="text" id="worked_days" name="worked_days"
                                                        class="form-control" aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default">
                                                </td>


                                                <td>
                                                    <label for="extra_hours" class="center mx-auto py-2">N° horas
                                                        extras:</label>
                                                    <input type="text" name="extra_hours" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default">
                                                </td>


                                                <td>
                                                    <label for="hour_value" class="center mx-auto py-2">Valor hora
                                                        mes:</label>
                                                    <input type="text" name="hour_value" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default">
                                                </td>

                                                <td>
                                                    <label for="bono" class="center mx-auto py-2">Bono:</label>
                                                    <input type="text" name="bono" class="form-control"
                                                        aria-label="Sizing example input"
                                                        aria-describedby="inputGroup-sizing-default">
                                                </td>
                                                <td>
                                                    <label for="accrued_id" class="center mx-auto py-2">Devgado
                                                        ID:</label>
                                                    <select class="form-select" name="accrued_id"
                                                        aria-label="Default select example">
                                                        <option value="" selected>Seleccionar</option>
                                                        @isset($accrueds)
                                                            @foreach ($accrueds as $accrued)
                                                                <option value="{{ $accrued['id'] }}">
                                                                    {{ $accrued['registration_date'] }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('accrued_id')
                                                        <div class="text-small text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <label for="discount_id" class="center mx-auto py-2">Descuento
                                                        ID:</label>
                                                    <select class="form-select" name="discount_id"
                                                        aria-label="Default select example">
                                                        <option value="" selected>Seleccionar</option>
                                                        @isset($discounts)
                                                            @foreach ($discounts as $discount)
                                                                <option value="{{ $discount['id'] }}">
                                                                    {{ $discount['registration_date'] }}
                                                                </option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('discount_id')
                                                        <div class="text-small text-danger">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="center">
                                <input type="hidden" name="employee_id" value="{{ $employee['id'] }}">
                                <input type="hidden" name="salary" value="{{ $employee['salary'] }}">
                                <button type="submit" class="btn btn-primary btn-dsdv">Registrar</button>
                            </div>
                        </form>
                    @endif
                @else
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Empleado</strong> Empleado no existe...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
