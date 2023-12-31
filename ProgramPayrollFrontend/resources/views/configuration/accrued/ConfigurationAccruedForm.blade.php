@csrf
<br>
<div class="container-sm 100% wide until small breakpoint">
    <label for="arl" class="form-label">Alimentacion: </label>
    <input type="number" step="0.01" class="form-control" id="feeding" name="feeding"
        @isset($accrued)
            value="{{ old('feeding', $accrued['feeding']) }}"
        @endisset
        aria-describedby="emailHelp" required>
    @error('feeding')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="salud" class="form-label">Vivienda: </label>
    <input type="number" step="0.01" class="form-control" id="salud" name="living_place"
        @isset($accrued)
            value="{{ old('living_place', $accrued['living_place']) }}"
        @endisset
        aria-describedby="emailHelp" required>
    @error('living_place')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="s" class="form-label">Transporte: </label>
    <input type="number" step="0.01" class="form-control" id="pension" name="transport"
        @isset($accrued)
            value="{{ old('transport', $accrued['transport']) }}"
        @endisset
        aria-describedby="emailHelp" required>
    @error('transport')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="parafiscal" class="form-label">Horas Extras: </label>
    <input type="number" step="0.01" class="form-control" id="parafiscal" name="extra"
        @isset($accrued)
            value="{{ old('extra', $accrued['extra']) }}"
        @endisset
        aria-describedby="emailHelp" require>
    @error('extra')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="fec" class="form-label">Fecha: </label>
    <input type="date" class="form-control" id="fecha" name="registration_date" required placeholder="YYYY-MM-DD"
        @isset($accrued)
            value="{{ old('registration_date', $accrued['registration_date']) }}"
        @endisset
        aria-describedby="emailHelp" require>
    @error('registration_date')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
