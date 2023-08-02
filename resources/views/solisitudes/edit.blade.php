@extends('layouts.app')

@section('contenido')

<div class="container-sm contenedor">

	<form action="{{ route('solisitudes.update' , $solisitud->id) }}"   method="post">
		@csrf
        @method("put")
		<div class="row g-3 bg-dark text-white container " >
			<div class="col-md-12" >
				<label
				style="text-align:center;" 
				class="form-label" 
				for="nombre_solisitud">Nombre De La Solicitud</label>
			</div>
			<div class="col-md-12">
				<input required type="text" value="{{$solisitud->Tipo_Solisitud}}"  class="form-control" name='Tipo_Solisitud'>
				@error('Tipo_Solisitud')
					 {{  $mensage }}
					 error
				@enderror
			</div>
			<div class="col-md-12">
				<button class="btn btn-success text-white boton"  >
				    Editar Solicitud
				</button>
				
			</div>
		</div>
	</form>	

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