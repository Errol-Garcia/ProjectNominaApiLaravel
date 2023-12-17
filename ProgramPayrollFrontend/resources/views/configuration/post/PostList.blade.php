@extends('TemplateAdmin');
@section('content')
    <div class="container-fluid">
        <div class="row center py-2">
            <div class="col-md-7">
                <div class="my-4">
                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Eliminado'){
        ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Eliminado</strong> Cargo con exito...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>

                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Error'){
        ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error</strong> vuelve a intentarlo...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>

                    <?php
            if(isset($_GET['mensaje']) and $_GET['mensaje']=='Actualizado'){
        ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Actualizacion</strong> se hizo con exito...
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
            }
        ?>
                </div>
                <div class="card mx-auto" style="width: 50rem;">
                    <div class="card">
                        <div class="card-header">
                            Lista de cargos
                        </div>
                        <div class="p-4">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th style="text-align: center" scope="col">#</th>
                                        <th style="text-align: center" scope="col">Nombre</th>
                                        <th style="text-align: center" scope="col" colspan="2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($post)
                                        <?php $cont = 1; ?>
                                        @foreach ($post as $pos)
                                            <tr>
                                                <td style="text-align: center">{{ $cont }}</td>
                                                <td style="text-align: center">{{ $pos['name'] }}</td>
                                                <td style="text-align: center" class="center">
                                                    <div style="display: flex">
                                                        <form method="POST" action="{{ route('post.destroy', $pos) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="text-danger"
                                                                style="background-color: transparent; border: none; outline: none"
                                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este cargo?')">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                        <a class='text-success' href="{{ route('post.edit', $pos) }}"><i
                                                                class='bi bi-pencil-square'></i>
                                                    </div>


                                                </td>
                                            </tr>
                                            <?php $cont++; ?>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                            <div style="display: flex;"class="center">

                                <a href="{{ route('post.create') }}" class="btn btn-primary">Añadir
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endsection
