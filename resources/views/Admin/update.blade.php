@extends('layouts.app')	

@section('contenido')
	<form class="container-sm" action="{{ route('Usuario.put' , $usuario->id) }}" method="post">
		@csrf
		@method('put')
	<div class=" contenido">

		<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Nombre</th>
			      <th scope="col">Apellido</th>
			      <th scope="col">Email</th>
			      <th scope="col">Cedula</th>
			      <th scope="col" >Cargo</th>
			    </tr>
			  </thead>
			  <tbody>
			 	<td>
			 		<input type="text" name="name" class="form-control" value="{{ $usuario->name }}">
			 	</td>
			 	<td>
			 		<input type="text"  name="apellido" class="form-control" value="{{ $usuario->apellido }}">
			 	</td>
			 	<td>
			 		<input type="text"  name="email" class="form-control" value="{{ $usuario->email }}">
			 	</td>
			 	<td>
			 		<input type="text" name="cedula" class="form-control" value="{{ $usuario->cedula }}">
			 	</td>
			 	<td>
			 		<select  name="role" class="form-control">
			 			
			 		
			 		@foreach($Role as $cargos)
			 			<option 

			 				value="{{ $cargos->name }}"
			 				{{ $usuario->roles[0]->id == $cargos->id ? 'selected' : '' }}
			 			>
			 				{{ $cargos->name }}
			 			</option>
			 		@endforeach

			 		</select>
			 	</td>
			 	<td>
			 		<button class="btn btn-success">
			 			Actulizar
			 		</button>
			 	</td>	
			
  			</tbody>
		</table>
	</div>	
	</form>
@endsection