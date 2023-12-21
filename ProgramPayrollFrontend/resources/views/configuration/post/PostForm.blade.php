@csrf
<div class="card mx-auto">
    <label for="cargo" class="form-label">Cargos</label>
    <input type="text" class="form-control" id="cargo" name="name"
    @isset($accrued)
        value="{{ old('name', $post['name']) }}"
    @endisset
        aria-describedby="emailHelp" required>
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

</div>
