@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row center py-5">
            <div class="col-3 ">
                <form action="{{ route('payroll.update', $salary['id']) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="worked_days" class="form-label">N° Dias Trabajados</label>
                        <input type="text" class="form-control" name="worked_days" value="{{ $salary['worked_days'] }}"
                            aria-describedby="emailHelp" required>

                        <label for="extra_hours" class="form-label">N° Horas extras</label>
                        <input type="text" class="form-control" name="extra_hours" value="{{ $salary['extra_hours'] }}"
                            aria-describedby="emailHelp" required>

                        <label for="hour_value" class="form-label">Valor hora mes</label>
                        <input type="text" class="form-control" name="hour_value" value="{{ $salary['hour_value'] }}"
                            aria-describedby="emailHelp" required>

                        <label for="bono" class="form-label">Valor bono</label>
                        <input type="text" class="form-control" name="bono" value="{{ $salary['bono'] }}"
                            aria-describedby="emailHelp" required>
                        <input type="hidden" name="id" value= "{{ $salary['id'] }}">
                        <input type="hidden" name="employee_id" value= "{{ $salary['employee']['id'] }}">
                        <input type="hidden" name="salary" value="{{ $salary['net_income'] }}">

                        <label for="bono" class="form-label">Selecciona devengado</label>
                        <select class="form-select" name="accrued_id" aria-label="Default select example">
                            <option value="" disabled selected>Seleccionar Cargo</option>

                            @isset($accrueds)
                                @foreach ($accrueds as $accrued)
                                    <option value="{{ $accrued['id'] }}"
                                        {{ old('accrued_id', $salary['accrued']['id']) == $accrued['id'] ? 'selected' : '' }}>
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
                            <label for="bono" class="form-label">Selecciona Descuento</label>
                            <select class="form-select" name="discount_id" aria-label="Default select example">
                                <option value="" disabled selected>Seleccionar Cargo</option>

                                @isset($discounts)
                                    @foreach ($discounts as $discount)
                                        <option value="{{ $discount['id'] }}"
                                            {{ old('discount_id', $salary['discount']['id']) == $discount['id'] ? 'selected' : '' }}>
                                            {{ $discount['registration_date'] }}
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('discount_id')
                                <div class="text-small text-danger">{{ $message }}</div>
                            @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
