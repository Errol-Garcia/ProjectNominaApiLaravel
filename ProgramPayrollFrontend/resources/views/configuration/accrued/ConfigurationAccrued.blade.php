@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row center py-2">
            <div class="col-md-11">
                <div class="my-4">
                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Eliminado'){
        ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Eliminado</strong> devengado con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>

                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
        ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>

                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Actualizado'){
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Actualizacion</strong> se hizo con exito..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>
                </div>
                <div class="card mx-auto" style="width: 60rem; margin-left: 200px">

                    <div class="card-header">
                        Devengado
                    </div>
                    <div class="p-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="text-align: center" scope="col">Alimentacion %</th>
                                    <th style="text-align: center" scope="col">Aux Vivienda %</th>
                                    <th style="text-align: center" scope="col">Aux Transporte %</th>
                                    <th style="text-align: center" scope="col">Bonificacion %</th>
                                    <th style="text-align: center" scope="col">Fecha</th>
                                    <th style="text-align: center" scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($accrued)
                                    @foreach ($accrued as $deven)
                                        <tr>
                                            <td style="text-align: center">{{ $deven['feeding'] }}</td>
                                            <td style="text-align: center">{{ $deven['living_place'] }}</td>
                                            <td style="text-align: center">{{ $deven['transport'] }}</td>
                                            <td style="text-align: center">{{ $deven['extra'] }}</td>
                                            <td style="text-align: center">{{ $deven['registration_date'] }}
                                            <td style="text-align: center" class="center">
                                                <div style="display: flex;">
                                                    <form method="POST" action="{{ route('accrued.destroy', $deven) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger"
                                                            style="background-color: transparent; border: none; outline: none"
                                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este departamento?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                    <a class='text-success' href="{{ route('accrued.edit', $deven) }}"><i
                                                            class='bi bi-pencil-square'></i>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div style="display: flex;" class="center">

                            <a href="{{ route('accrued.create') }}" class="btn btn-primary">Añadir </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
