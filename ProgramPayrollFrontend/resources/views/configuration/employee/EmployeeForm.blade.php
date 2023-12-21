@csrf
<table class="tdEmpleado">
    <tr>
        <td><input type="text" placeholder="Cedula" class="form-control" id="cedula" name="identification_card"
            @isset($accrued)
                value="{{ old('identification_card', $employee['identification_card']) }}" aria-describedby="emailHelp" required>
            @endisset
            @error('identification_card')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td><input placeholder="Nombres"  type="text" id="names" name="names" class="form-control" aria-label="Sizing example input"
            @isset($accrued)
                value="{{ old('names', $employee['names']) }}"
            @endisset
            aria-describedby="inputGroup-sizing-default">
            @error('names')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td><input placeholder="Apellidos" type="text" id="last_names" name="last_names" class="form-control" aria-label="Sizing example input"
            @isset($accrued)
                value="{{ old('last_names', $employee['last_names']) }}"
            @endisset
            aria-describedby="inputGroup-sizing-default">
            @error('last_names')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td><input placeholder="Telefono" type="text" id="number_phone" name="number_phone" class="form-control" aria-label="Sizing example input"
            @isset($accrued)
                value="{{ old('number_phone', $employee['number_phone']) }}"
            @endisset
            aria-describedby="inputGroup-sizing-default">
            @error('number_phone')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td colspan="2"><input placeholder="Direccion" type="text" id="address" name="address" class="form-control" aria-label="Sizing example input"
            @isset($accrued)
                value="{{ old('address', $employee['address']) }}"
            @endisset
            aria-describedby="inputGroup-sizing-default">
            @error('address')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td colspan="3"><input placeholder="Email" type="text" id="email" name="email" class="form-control" aria-label="Sizing example input"
            @isset($accrued)
                value="{{ old('email', $employee['email']) }}"
            @endisset
            aria-describedby="inputGroup-sizing-default">
            @error('email')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>
            <input placeholder="Salario" type="text" id="salario" name="salary" class="form-control"
            @isset($accrued)
                value="{{ old('salary', $employee['salary']) }}"
            @endisset
            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            @error('salary')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
            {{-- <input type="hidden" name="id" value="{{ old('id', $employee) }}"> --}}
        </td>
        <td>
            <select class="form-select" name="post_id" aria-label="Default select example">
                <option value="" disabled selected>Seleccionar Cargo</option>

                @isset($post)
                    @foreach ($post as $car)
                        <option value="{{ $car['id'] }}"
                            {{ old('post_id', $employee['post']['id']) == $car['id'] ? 'selected' : '' }}>
                            {{ $car['name'] }}
                        </option>
                    @endforeach
                @endisset
            </select>
            {{-- <select class="form-select" name="post_id" aria-label="Default select example">
                <option value="{{ $employee['post']['id'] }}" selected>Seleccionar Cargo</option>

                @isset($post)
                    @foreach ($post as $car)
                        <option value="{{ $car['id'] }}">
                            @isset($employee)
                                @selected(old('post_id', $employee['post']['id']) == $employee['post']['id'])
                            @else
                                @selected(old('post_id', $employee['post']['id']) == $car['id'])
                            @endisset
                            {{ $car['name'] }}
                        </option>
                    @endforeach
                @endisset
            </select> --}}
            @error('post_id')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td>
            <select class="form-select" name="department_id" aria-label="Default select example">
                <option value="" disabled selected>Seleccionar Cargo</option>

                @isset($department)
                    @foreach ($department as $car)
                        <option value="{{ $car['id'] }}"
                            {{ old('department_id', $employee['department']['id']) == $car['id'] ? 'selected' : '' }}>
                            {{ $car['name'] }}
                        </option>
                    @endforeach
                @endisset
            </select>
            {{-- <label for="" style="display: flex; justify-content: Center;">Departamento</label> --}}
            {{-- <select class="form-select" name="department_id" aria-label="Default select example">
                <option value="" selected>Seleccionar Departamento</option>
                @isset($department)
                    @foreach ($department as $depart)
                        <option value="{{ $depart['id'] }}">
                            @isset($empleado)
                                @selected(old('department_id', $employee['department']['id']) == $employee['department']['id'])
                            @else
                                @selected(old('department_id', $employee['department']['id']) == $depart['id'])
                            @endisset
                            {{ $depart['name'] }}
                        </option>
                    @endforeach
                @endisset
            </select> --}}
            @error('department_id')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
</table>
