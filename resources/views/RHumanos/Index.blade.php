@extends('layouts.app')
@section('titulo', 'inicio')

@section('contenido')

    <div class="container-sm">
        <h1 class="alert alert-success">
            Registros
        </h1>
        <div class="container-sm">
            <form action="{{ route('usuario.buscar')  }}" method="post" >
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><button class="btn btn-primary" > buscar </button></span>
                    <input type="text" class="form-control"  name="cedula" placeholder="cedula ejemplo 26101877" aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </form>
        </div>
        @if (session('mensage'))
            <h2 class="alert alert-success">
                {{ session('mensage') }}
            </h2>
        @endif

        <div class="data">
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
                    @foreach ($usuarios as $usuario)
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
