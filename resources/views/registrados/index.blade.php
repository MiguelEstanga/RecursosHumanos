@extends('layouts.app')


@section('contenido')
    <div class="container-sm">
        <h1 class="alert alert-success">
            Bienvenido {{ Auth::user()['name'] }} {{ Auth::user()['name'] }}
        </h1>
        <section class="container boseria ">
            @if (session('mensage'))
                <h2 class="alert alert-success">{{ session('mensage') }}</h2>
            @endif
            @foreach ($anuncions as $anuncion)
                <div class="card w-75 mb-3">
                    <div class="card-body">
                        <h5 class="card-title">
                            fecha : {{ $anuncion->created_at }}
                        </h5>
                        <h5 class="card-title">
                            titulo : {{ $anuncion->titulo }}

                        </h5>
                        <p class="card-text">{{ $anuncion->anuncion }}</p>

                    </div>
                    @can('superadmin')
                        <div>
                            <a class="btn btn-success" href="{{ route('anuncion.editar', $anuncion->id) }}"> editar </a>
                            <form action="{{ route('anuncion.delete', $anuncion->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">eliminar</button>
                            </form>
                        </div>
                    @endcan

                </div>
            @endforeach


        </section>
    </div>
@endsection

<style>
    .boseria {

        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
</style>
