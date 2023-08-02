@extends('layouts.app')

@section('contenido')


<div class="container-sm conten">
	<x-plnilla-carts :planilla="$planilla" />
<form action="{{ route('planilla.respuesta.admin' , $planilla->id) }}" method="post" >
	@csrf
	@if(session('opcion'))
		<h5  class="alert alert-danger" style="width:30%"  >
			{{ session('opcion')}}
		</h5>
	@endif
	<div class="seleccionar" >
		
	
	<select class="form-control" name="estado" id="respuesta m-t-5" style="margin:20px 0" >
				<option value="null" seleted >
					Seleccione una Opción  ⬇
				</option>
			@foreach($estados as $estado)
				@if( $estado->id != 1 && $estado->id != 3 && $estado->id != 2 )
				<option
					value="{{ $estado->id }}">
					{{ $estado->estado }}
				</option>
				@endif
			
			@endforeach
	
	</select>
	
	</div>
	@error('mensage')
		<h5  class="alert alert-danger">
			¡Por favor, rellene el cuadro de descripción de la respuesta!
		</h5>
	@enderror
	<textarea required class="form-control" name="mensage" id="" cols="30" rows="10">
		
	</textarea>

	<button class="btn bg-dark text-white " >
		Responder
	</button>
</form>
</div>

<style>
	.seleccionar{
		width:210px;
	}
	.flechita{
		border:solid 5px black solid ;
		width:10px;
		height:10px;
	}
	.conten{
		margin-top: 20px;

	}

	form{
		margin-top: 10px;
	}
</style>
@endsection