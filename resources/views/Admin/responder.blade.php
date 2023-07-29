@extends('layouts.app')

@section('contenido')


<div class="container-sm conten">
	<x-plnilla-carts :planilla="$planilla" />
<form action="{{ route('planilla.respuesta.admin' , $planilla->id) }}" method="post" >
	@csrf
	<select class="form-control" name="estado" id="">
		<option value="">
			@foreach($estados as $estado)
				<option
					{{ $planilla->estado->id == $estado->id ? 'selected' : '' }} 
					value="{{ $estado->id }}">
					{{ $estado->estado }}
				</option>
			@endforeach
		</option>
	</select>
	<textarea class="form-control" name="mensage" id="" cols="30" rows="10">
		
	</textarea>
	<button class="btn bg-dark text-white " >
		responder
	</button>
</form>
</div>

<style>
	.conten{
		margin-top: 20px;

	}

	form{
		margin-top: 10px;
	}
</style>
@endsection