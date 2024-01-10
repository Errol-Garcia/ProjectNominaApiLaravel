@extends('TemplateAdmin')
@section('content')
    <div class="container-fluid">
        <div class="row center py-2">
            <div class="col-md-12 justify-start">
                <div class="my-2">
                    <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje']=='Eliminado'){
            ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Eliminado</strong> Empleado con exito..
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
                <div class="card mx-auto">

                    <div class="card-header">
                        Lista de empleados
                    </div>
                    <div class="p-4">
                        <table class="table align-middle" style='justify-content: Right;'>
                            <thead>
                                <tr>
                                    <th style="text-align: center" scope="col">#</th>
                                    <th style="text-align: center" scope="col">Cedula</th>
                                    <th style="text-align: center" scope="col">Nombres</th>
                                    <th style="text-align: center" scope="col">Apellidos</th>
                                    <th style="text-align: center" scope="col">Telefono</th>
                                    <th style="text-align: center" scope="col">Cargo</th>
                                    <th style="text-align: center" scope="col">Departamento</th>
                                    <th style="text-align: center" scope="col">Direccion</th>
                                    <th style="text-align: center" scope="col">Email</th>
                                    <th style="text-align: center" scope="col" colspan="2">Opciones</th>
                                    <?php //echo $th;
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($employee)
                                    <?php $cont = 1; ?>
                                    @foreach ($employee as $emple)
                                        <tr>
                                            <td style="text-align: center">{{ $cont }}</td>
                                            <td style="text-align: center">{{ $emple['identification_card'] }}</td>
                                            <td style="text-align: center">{{ $emple['names'] }}</td>
                                            <td style="text-align: center">{{ $emple['last_names'] }}</td>
                                            <td style="text-align: center">{{ $emple['number_phone'] }}</td>
                                            <td style="text-align: center">{{ $emple['post']['name'] }}</td>
                                            <td style="text-align: center">{{ $emple['department']['name'] }}</td>
                                            <td style="text-align: center">{{ $emple['address'] }}</td>
                                            <td style="text-align: center">{{ $emple['email'] }}</td>
                                            <td style="text-align: center">
                                                <a class='text-success'
                                                    href="{{ route('employee.edit', $emple['identification_card']) }}">
                                                    <i class='bi bi-pencil-square'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $cont++; ?>
                                    @endforeach
                                @endisset
                            </tbody>
                        </table>
                        <div style="display: flex; " class="center">
                            <a href="{{ route('employee.create') }}" class="btn btn-primary">Añadir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
