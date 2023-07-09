@extends('layouts.app')
@section('titulo', 'inicio')

@section('contenido')

    <div class="container-sm">
        <h1 class="alert alert-success">
            Registros
        </h1>

        @if (session('mensage'))
            <h2 class="alert alert-success">
                {{ session('mensage') }}
            </h2>
        @endif

        <div class="data">
            @if ($usuario == null)
                <h2>
                    No se encontro registro
                </h2>
            @else
                <table class="table table-warning c-whited" style="color: rgb(73, 73, 190)">
                    <thead>
                        <tr>
                            <th scope="col">
                                nombre
                            </th>
                            <th scope="col">
                                apellido
                            </th>
                            <th>
                                cedula
                            </th>
                            <th>
                                email
                            </th>
                            <th>
                                tipo de usuario
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->cedula }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                @if ($usuario->role_id == 1)
                                    Administrdor
                                @endif

                                @if ($usuario->role_id == 2)
                                    Usuario
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('gestionar.edit', $usuario->id) }}" class="btn btn-success">
                                    editar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('gestionar.delete', $usuario->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">eliminar</button>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
            @endif

        </div>
    </div>

@endsection
