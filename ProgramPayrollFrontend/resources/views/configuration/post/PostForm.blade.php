@csrf
<div class="card mx-auto">
    <label for="cargo" class="form-label">Cargos</label>
    <input type="text" class="form-control" id="cargo" name="name"value="{{ old('name', $post['name']) }}"
        aria-describedby="emailHelp" required>
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

</div>
