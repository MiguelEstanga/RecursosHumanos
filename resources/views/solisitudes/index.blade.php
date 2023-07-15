@extends("layouts.app")

@section('contenido')

<div class="container-sm contenedor">
		@if(session('mensage') )
			<x-alerta  :mensage="session('mensage')" />
			
	@endif
	<ul class="list-group  bg-dark  text-white ">
		<li class="list-group-item text-center list-group-item-dark fs-4"> 
			Solicitudes Creadas 
		</li>
		@foreach($solisitudes as $solisitud)
			 <li  class="list-group-item list-group-item-dark">{{ $solisitud->Tipo_Solisitud }}</li>
		@endforeach
			<li class="list-group-item list-group-item-dark" >
				<a href="{{ route('solisitudes.create') }}" class="btn text-white bg-dark">Crear Nueva Solcitud</a>
			</li>
	</ul>
</div>

<style>
	.contenedor{
		margin-top:30px;
	}
</style>
@endsection