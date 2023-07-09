@extends('layouts.app')

@section('titulo', 'anuncion:editar')

@section('contenido')

    <div class="contenedor">
        <h2 class="alert ">
            Editar anuncio
        </h2>
        @if (session('mensage'))
            <h2 class="alert alert-success">{{ session('mensage') }}</h2>
        @endif
        <div>

            <form action="{{ route('anuncion.update' , $editar->id ) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="titulo" class="form-label"> Titulo </label>
                    <input type="text" value="{{$editar->titulo}}" class="form-control" id="titulo" name="titulo">
                    @error('titulo')
                        <p style="color: red">minimo 5 letras</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">anuncion</label>
                    <textarea name="anuncion" value="{{ $editar->anuncion }}" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    @error('anuncion')
                        <p style="color: red">minimo 5 letras</p>
                    @enderror
                </div>
                <button class="btn btn-success">editar anuncion</button>
            </form>

        </div>
    </div>

@endsection

.contenedor{
    background: rgba(255, 255, 255, .5);
    -webkit-backdrop-filter: blur(5px);
    backdrop-filter: blur(5px);
    border: 1.5px solid rgba(209, 213, 219, 0.3);
    padding: 10px;
    width: 40%;
    margin: auto;
    color: rgb(8, 8, 126);
    border-radius:5px;
    transition: all 300ms linear; 
}

.contenedor:hover{
    
    transform: scale(1.1);
}