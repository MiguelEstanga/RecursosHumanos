@extends('layouts.app')
@section('titulo' , 'planillas')
@section('contenido')
    <div class="container-sm">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">planillas disponibles</li>
            <li class="list-group-item">
                <a href="{{ route('beneficiario') }}">
                    SOLICITUD DE PLANILLA DE BENEFICIOS 
                </a>
                 
            </li>
        
          </ul>
    </div>

 
@endsection