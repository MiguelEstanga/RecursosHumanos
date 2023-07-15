<h2>
	Responder de {{ $planilla->user->name }} a nombre de {{ $planilla->Nombre_completo }}
</h2>
<h3>Estado actial {{ $planilla->estado->estado }}</h3>

<form action="{{ route('planilla.respuesta.admin' , $planilla->id) }}" method="post" >
	@csrf
	<select name="estado" id="">
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
	<textarea name="mensage" id="" cols="30" rows="10">
		
	</textarea>
	<button>
		responder
	</button>
</form>