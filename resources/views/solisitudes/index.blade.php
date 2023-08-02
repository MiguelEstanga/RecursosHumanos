@extends("layouts.app")

@section('contenido')

<div class="container-sm contenedor">

	<ul class="list-group  bg-dark  text-white ">
		<li class="list-group-item text-center list-group-item-dark fs-4" style="color:black" > 
			Solicitudes Creadas 
		</li>
		@foreach($solisitudes as $solisitud)
			 <li  class="list-group-item list-group-item-dark" style="color:black;" >{{ $solisitud->Tipo_Solisitud }}</li>
		@endforeach
			<li class="list-group-item list-group-item-dark" >
				<a href="{{ route('solisitudes.create') }}" class="btn text-white bg-dark">Crear Nueva Solicitud</a>
			</li>
	</ul>
</div>

<style>
	.contenedor{
		margin-top:30px;
	}

	ul li{
		color:black;
	}
</style>
@endsection