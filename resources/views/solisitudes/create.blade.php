@extends('layouts.app')

@section('contenido')

<div class="container-sm contenedor">

	<form action="{{ route('solisitudes.store') }}"  method="post">
		@csrf
		<div class="row g-3 bg-dark text-white container " >
			<div class="col-md-12" >
				<label
				style="text-align:center;" 
				class="form-label" 
				for="nombre_solisitud">Nombre De La Solicitud</label>
			</div>
			<div class="col-md-12">
				<input required type="text" class="form-control" name='Tipo_Solisitud'>
				@error('Tipo_Solisitud')
					 {{  $mensage }}
					 error
				@enderror
			</div>
			<div class="col-md-12">
				<button class="btn btn-success text-white boton"  >
					Crear Solicitud
				</button>
				
			</div>
		</div>
	</form>	
	<div class="list">
		
		
		<ul class="list-group  bg-dark  text-white list_">
			<li class="list-group-item text-center list-group-item-dark fs-4"> 
				Solicitudes Creadas 
			</li>
			@foreach($solisitudes as $solisitud)
				<li  class="list-group-item list-group-item-dark">{{ $solisitud->Tipo_Solisitud }}  
					<a href="{{ route('solisitudes.edit' , $solisitud->id)  }}">editar</a> 
				</li>
			@endforeach
				
		</ul>
</div>

<style>
	.contenedor{
		margin-top:30px;
	}
</style>

</div>

<style>
	.contenedor{
		margin-top: 50px;
	}
	.list{
		margin-top:30px;
		margin:auto;
		margin-right:15px;
		margin-top:50px;
		color:black;
	}

	ul li{
		color:black!important;
	}


	.container{
		width:100%;
		padding:10px;
		
	}
	label{
		margin:center;
	}
	.boton{
		margin:center;
	}
</style>
@endsection