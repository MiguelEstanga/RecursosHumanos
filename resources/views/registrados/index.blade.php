@extends('layouts.app')


@section('contenido')
    <div class="container-sm">

        <section class="container boseria ">
         
            @foreach ($anuncion as $anuncion)
                <div class="card  text-bg-dark  w-75 mb-3  text-white">
                    <div class="card-header">
                          <h5 class="card-title">
                            fecha : {{ $anuncion->created_at }}
                        </h5>
                        <h5 class="card-title">
                            titulo : {{ $anuncion->titulo }}

                        </h5>
                    </div>
                    <div class="card-body">
                      
                        <p class="card-text">{{ $anuncion->anuncion }}</p>

                    </div>
                    @can('superadmin')
                        <div>
                            <a class="btn btn-outline-success" href="{{ route('anuncion.edit', $anuncion->id) }}"> editar </a>
                            <form action="{{ route('anuncion.destroy', $anuncion->id) }}" method="POST"
                                style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger">eliminar</button>
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
        margin-top: 30px;
    }
</style>
