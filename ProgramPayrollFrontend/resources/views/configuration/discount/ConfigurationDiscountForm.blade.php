@csrf
<br>
<div class="container-sm 100% wide until small breakpoint">
    <label for="arl" class="form-label">ARL (%):</label>
    <input type="number" step="0.001" class="form-control" id="arl" name="arl"
        @isset($discount)
        value="{{ old('arl', $discount['arl']) }}" required>
    @endisset
        @error('arl')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror <label
        for="salud" class="form-label">Salud (%):</label>
    <input type="number" step="0.001" class="form-control" id="salud" name="health"
        @isset($discount)
        value="{{ old('health', $discount['health']) }}" aria-describedby="emailHelp" required>
    @endisset
        @error('health')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror <label
        for="s" class="form-label">Pension (%):</label>
    <input type="number" step="0.001" class="form-control" id="pension" name="pension"
        @isset($discount)
        value="{{ old('pension', $discount['pension']) }}" aria-describedby="emailHelp" required>
    @endisset
        @error('pension')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror <label
        for="parafiscal" class="form-label">Parafiscal (%):</label>
    <input type="number" step="0.001" class="form-control" id="parafiscal" name="parafiscal"
        @isset($discount)
        value="{{ old('parafiscal', $discount['parafiscal']) }}" aria-describedby="emailHelp" require>
    @endisset
        <input type="hidden" name="id"
        @isset($discount)
        value="{{ old('id', $discount['id']) }}">
    @endisset
        @error('parafiscal')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror <label
        for="parafiscal" class="form-label">Fecha:</label>
    <input type="date" class="form-control" id="Fecha" name="registration_date"
        @isset($discount)
        value="{{ old('registration_date', $discount['registration_date']) }}" aria-describedby="emailHelp" require>
    @endisset
        @error('registration_date')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
        </div>
