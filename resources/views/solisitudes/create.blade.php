@extends('layouts.app')

@section('contenido')

<div class="container-sm contenedor">

	<form action="{{ route('solisitudes.store') }}"  method="post">
		@csrf
		<div class="row g-3" >
			<div class="col-md-6">
				<label class="form-label" for="nombre_solisitud">Nombre De La Solicitud</label>
			</div>
			<div class="col-md-6">
				<input required type="text" class="form-control" name='Tipo_Solisitud'>
				@error('Tipo_Solisitud')
					 {{  $mensage }}
					 error
				@enderror
			</div>
			<div class="col-md-12">
				<button class="btn bg-dark text-white "  >
					Crear Solicitud
				</button>
				
			</div>
		</div>
	</form>	
	

</div>

<style>
	.contenedor{
		margin-top: 50px;
	}
</style>
@endsection