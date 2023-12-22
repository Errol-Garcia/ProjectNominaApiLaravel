@extends('auth.TemplateIndex')

@section('content')
    <br>
    <div class="card mx-auto container-sm 100% wide until small breakpoint" style="background-color: #f0f0f0;">


        <div class="row center py-2">
            <div class=" col-md-3">
                <div class=" my-4">
                    <p style="font: small-caps 100%/200% serif; font-size: 30px " class="center">Regístrate</p>
                    <form action="{{ route('save') }}" method="post">
                        @csrf
                        <td>
                            <label for="rol_id" class="mx-auto py-2">Nombre completo:</label>
                            <input id="name" name="name" type="text" class="form-control">
                            <div class="input-group-append py-2">
                            </div>
                            @error('name')
                                <div class="text-small text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <label for="rol_id" class="mx-auto py-2">usuario:</label>
                            <div class="input-group mb-3">
                                <input id="ususario" name="user" type="text" class="form-control">
                                <div class="input-group-append">
                                </div>
                            </div>
                            @error('user')
                                <div class="text-small text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <label for="rol_id" class="mx-auto py-2">Contraseña:</label>
                            <div class="input-group mb-3">
                                <input id="password" name="password" type="password" class="form-control">
                                <div class="input-group-append">
                                </div>
                            </div>
                            @error('password')
                                <div class="text-small text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <label for="rol_id" class="mx-auto py-2">Confirmar contraseña:</label>
                            <div class="input-group mb-3">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    class="form-control">
                                <div class="input-group-append">
                                </div>
                            </div>
                            @error('password_confirmation')
                                <div class="text-small text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <label for="cedula" class="mx-auto py-2">Cedula:</label>
                        <div class="input-group mb-3">
                            <input id="email" name="identification_card" type="text" class="form-control">
                            <div class="input-group-append">
                            </div>
                        </div>
                        </td>

                        <td>
                            <label for="rol_id" class="mx-auto py-2">Rol id:</label>
                            <select class="form-select" name="role_id" aria-label="Default select example">
                                <option value="" selected>Seleccionar</option>
                                @isset($roles)
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol['id'] }}">
                                            @isset($rol)
                                                @selected(old('role_id', $rol) == $rol['id'])
                                            @else
                                                @selected(old('role_id', $rol) == $rol['id'])
                                            @endisset
                                            {{ $rol['name'] }}
                                        </option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('role_id')
                                <div class="text-small text-danger">{{ $message }}</div>
                            @enderror
                        </td>
                        <div class="container">
                            <div class="row" style="display: flex;">
                                <div class="col-6 center py-4" style="flex: 50%;">
                                    <button type="submit" class="btn btn-primary">
                                        Registrar
                                    </button>
                                </div>
                                <div class="col-6 center py-4" style="flex: 50%;">
                                    <a href="{{ route('login') }}" class="btn btn-primary">
                                        Salir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
