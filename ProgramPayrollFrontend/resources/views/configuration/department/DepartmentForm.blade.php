@csrf
<div class="card mx-auto">
    <label for="departamento" class="form-label">Departamtento</label>
    <input type="text" class="form-control" id="departamento" name="name"
        value="{{ old('name', $department['name']) }}" aria-describedby="emailHelp" required>
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

</div>
