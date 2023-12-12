@csrf
<br>

<div class="container-sm 100% wide until small breakpoint" >
    <label for="arl" class="form-label">ARL (%):</label>
    <input type="number" step="0.001" class="form-control" id="arl" name="arl"
        value="{{ old('arl', $discount) }}" required>
    @error('arl')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="salud" class="form-label">Salud (%):</label>
    <input type="number" step="0.001" class="form-control" id="salud" name="health"
        value="{{ old('health', $discount) }}" aria-describedby="emailHelp" required>
    @error('health')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="s" class="form-label">Pension (%):</label>
    <input type="number" step="0.001" class="form-control" id="pension" name="pension"
        value="{{ old('pension', $discount) }}" aria-describedby="emailHelp" required>
    @error('pension')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="parafiscal" class="form-label">Parafiscal (%):</label>
    <input type="number" step="0.001" class="form-control" id="parafiscal" name="parafiscal"
        value="{{ old('parafiscal', $discount) }}" aria-describedby="emailHelp" require>
    <input type="hidden" name="id" value="{{ old('id', $discount) }}">
    @error('parafiscal')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

    <label for="parafiscal" class="form-label">Fecha:</label>
    <input type="date" class="form-control" id="Fecha" name="registration_date"
        value="{{ old('registration_date', $discount) }}" aria-describedby="emailHelp" require>
    @error('registration_date')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

</div>

