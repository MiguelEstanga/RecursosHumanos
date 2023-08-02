@extends('layouts.app')	

@section('contenido')
	<div class=" contenido">

		<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Nombres</th>
			      <th scope="col">Apellidos</th>
			      <th scope="col">Email</th>
			      <th scope="col">Cédula</th>
			      <th scope="col" >Cargo</th>

			      <th scope="col" > Editar Rol </th>
			   
			      <th scope="col" >Eliminar Planillas</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($usuarios as $usuario)
			  		@if($usuario->roles[0]->id != 3)
						<tr>
						      <td> <div class="border"> {{ $usuario->name }} </div> </td>
						      <td>{{ $usuario->apellido }}</td>
						      <td>{{ $usuario->email }}</td>
						      <td>{{ $usuario->cedula }}</td>
						      <td>{{ $usuario->getRoleNames()[0] }}</td>
						     
						      <td>
						      	<a 
						      		class="btn btn-success"
						      		target="_black" 
						      		href="{{ route('Usuario.update' , $usuario->id) }}"
						      	>
						      		Editar usuario
						      	</a>
						      </td>
						      
					
						 	<td>
						 		<form action="{{ route('usurio.delete_planillas' , $usuario->id) }}" method="post" >
						 			@csrf
						 			@method('delete')
						 			<button class="btn btn-danger" >
						 				Eliminar planillas {{ count($usuario->planillas) }}
						 			</button>
						 		</form>
						 	</td>		
			
						      
					    </tr>
			  		@endif
			 
			  	@endforeach
			 
			
  			</tbody>
		</table>
	</div>	
		
	<style>
		.contenido{
			display: flex;
			flex-wrap: wrap;
			gap: 20px;
			margin: 10px auto;
			width: 70vw;
		}
		.card{
			width: 100%;
		}

		tr th{
			font-size:25px;
		}

		tr td{
			font-weight:700;
			color:#fff;
			text-align:left;
			font-weight:bold;
			font-size:20px;
			text-shadow: 1px 1px black;
			
		}

		.border{
			border:none!important;
			
			
		}
	</style>
@endsection