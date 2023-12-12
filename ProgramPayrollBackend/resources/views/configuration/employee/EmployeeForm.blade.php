@csrf
<table class="tdEmpleado">
    <tr>
        <td><input type="text" placeholder="Cedula" class="form-control" id="cedula" name="identification_card"
                value="{{ old('identification_card', $employee) }}" aria-describedby="emailHelp" required>
            @error('identification_card')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td><input placeholder="Nombres" value="{{ old('names', $employee) }}" type="text" id="names"
                name="names" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default">
            @error('names')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td><input placeholder="Apellidos" value="{{ old('last_names', $employee) }}" type="text" id="last_names"
                name="last_names" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default">
            @error('last_names')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td><input placeholder="Telefono" value="{{ old('number_phone', $employee) }}" type="text" id="number_phone"
                name="number_phone" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default">
            @error('number_phone')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td colspan="2"><input placeholder="Direccion" value="{{ old('address', $employee) }}" type="text"
                id="address" name="address" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default">
            @error('address')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td colspan="3"><input placeholder="Email" value="{{ old('email', $employee) }}" type="text"
                id="email" name="email" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-default">
            @error('email')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
    <tr>
        <td>
            <input placeholder="Salario" type="text" id="salario" name="salary" class="form-control"
                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
                value="{{ old('salary', $employee) }}">
            @error('salary')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
            {{-- <input type="hidden" name="id" value="{{ old('id', $employee) }}"> --}}
        </td>
        <td>
            <select class="form-select" name="post_id" aria-label="Default select example">
                <option value="{{ $employee->post_id }}" selected>Seleccionar Cargo</option>

                @isset($post)
                    @foreach ($post as $car)
                        <option value="{{ $car->id }}">
                            @isset($employee)
                                @selected(old('post_id', $employee) == $employee->post_id)
                            @else
                                @selected(old('post_id', $employee) == $car->id)
                            @endisset
                            {{ $car->name }}
                        </option>
                    @endforeach
                @endisset
            </select>
            @error('post_id')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
        <td>
            {{-- <label for="" style="display: flex; justify-content: Center;">Departamento</label> --}}
            <select class="form-select" name="department_id" aria-label="Default select example">
                <option value="" selected>Seleccionar Departamento</option>
                @isset($department)
                    @foreach ($department as $depart)
                        <option value="{{ $depart->id }}">
                            @isset($empleado)
                                @selected(old('department_id', $employee) == $employee->department_id)
                            @else
                                @selected(old('department_id', $employee) == $depart->id)
                            @endisset
                            {{ $depart->name }}
                        </option>
                    @endforeach
                @endisset
            </select>
            @error('department_id')
                <div class="text-small text-danger">{{ $message }}</div>
            @enderror
        </td>
    </tr>
</table>
