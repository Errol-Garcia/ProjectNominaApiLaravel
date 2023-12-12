@csrf
<br>
<div class="container-sm 100% wide until small breakpoint">

    <label for="arl" class="form-label">Alimentacion: </label>
    <input type="number" step="0.01" class="form-control" id="arl" name="feeding"
        value="{{ old('feeding', $accrued) }}" aria-describedby="emailHelp" required>
    @error('feeding')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="salud" class="form-label">Vivienda: </label>
    <input type="number" step="0.01" class="form-control" id="salud" name="living_place"
        value="{{ old('living_place', $accrued) }}" aria-describedby="emailHelp" required>
    @error('living_place')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="s" class="form-label">Transporte: </label>
    <input type="number" step="0.01" class="form-control" id="pension" name="transport"
        value="{{ old('transport', $accrued) }}" aria-describedby="emailHelp" required>
    @error('transport')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="parafiscal" class="form-label">Horas Extras: </label>
    <input type="number" step="0.01" class="form-control" id="parafiscal" name="extra"
        value="{{ old('extra', $accrued) }}" aria-describedby="emailHelp" require>
    @error('extra')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="fec" class="form-label">Fecha: </label>
    <input type="date" class="form-control" id="fecha" name="registration_date" required placeholder="YYYY-MM-DD"
        value="{{ old('registration_date', $accrued) }}" aria-describedby="emailHelp" require>
    @error('registration_date')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
    {{-- <label for="fec" class="form-label">Fecha</label>
    <input type="date" class="form-control" id="fecha" name="fechaRegistro" required placeholder="YYYY-MM-DD"
        value="{{ old('fechaRegistro', isset($accrued) ? $accrued : '') }}" aria-describedby="emailHelp" require>
    @error('fechaRegistro')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror --}}

</div>
