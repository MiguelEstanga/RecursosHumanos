@extends('layouts.app')

@section('contenido')
	<div class="container-sm">
		<form class="row g-3 formulario bg-dark text-white" action="{{ route('planillabeneficiario.store') }}" method="post">
			@csrf
			<div class="col-md-12">
				<select required name="solisitud" id="solisitud" class="form-select" 'solisitud' aria-label="Default select example">
								<option value="null" selected>
									Seleciones una opcion
								</option>
						@foreach($solisitudes as $solisitud)  
		  						<option value="{{ $solisitud->id }}">{{ $solisitud->Tipo_Solisitud }}</option>
						@endforeach
				</select>
				@error("solisitud")
					<p style="color:red" > campo obligatorio </p>
				@enderror
			</div>

			<div class="col-md-6">
				<label for="nombre-completo"  class="form-label">
					Nombre Completo
				</label>
				<input required type="text" placeholder="nombre-completo" name="Nombre_Completo" class="form-control">
				<div class="validated">
					@error("Nombre_Completo")
						<p style="color:red" >campo obligatorio </p>
					@enderror
				</div>
			</div>
			<div class="col-md-6">
				<label for="nombre-completo"  class="form-label">
					Apellido Completo
				</label>
				<input type="text" required placeholder="Apellido" name="Apellido_Completo" class="form-control">
				<div class="validated">
					@error("Apellido_Completo")
						<p style="color:red" > campo obligatorio </p>
					@enderror
				</div>
			</div>
			<div class="col-md-6">
				<label for="nombre-completo"  class="form-label">
					Codigo
				</label>
				<input type="text" required placeholder="Codigo" name="Codigo" class="form-control">
				<div class="validated">
					@error("Codigo")
						<p style="color:red" > campo obligatorio </p>
					@enderror
				</div>
			</div>
			<div class="col-md-6">
				<label for="nombre-completo"  class="form-label">
					Cargo
				</label>
				<input type="text" required placeholder="Cargo" name="Cargo" class="form-control">
				<div class="validated">
					@error("Cargo")
						<p style="color:red" > campo obligatorio </p>
					@enderror
				</div>
			</div>
			<div class="col-md-6">
				<label for="nominal">
					Dependencia Nominal
				</label>
				<input type="text" class="form-control" name="Dependencia_Nominal" >
				<div class="validated">
					@error("Dependencia_Nominal")
						<p style="color:red" >campo obligatorio </p>
					@enderror
				</div>
			</div>
			<div class="col-md-6">
				<label for="nominal">
					Cedula
				</label>
				<input type="text" class="form-control" name="Cedula_beneficiario" >
				<div class="validated">
					@error("Cedula")
						<p style="color:red" >campo obligatorio </p>
					@enderror
				</div>
			</div>
			<div class="col-md-12">
				<label for="Direccion">
					Direccion
				</label>
				<textarea required name="Direccion" class="form-control" cols="30" rows="10" placeholder="Direccion numero telefonico"></textarea>
				<div class="validate">
					@error("Direccion")
						<p style="color:red" > campo obligatorio </p>
					@enderror
				</div>
			</div>
			<h2>Carga Familiar  <a class="btn btn-success" id="agregar"  >agregar +</a> </h2>
			<div id="contencarga">

			  <div class="  row g-3" id="carga_familiar">
				 <table class="table text-white "   >
				 	<thead id="headtable" >
						 <tr>
							<th scope="col">Fecha Nacimiento</th>
							<th scope="col">Fecha De Defuncion</th>
							<th scope="col">Nombre y Apellido</th>
							<th scope="col">nombre</th>
							<th scope="col">Cedula</th>
							<th scope="col">Edad</th>
							<th scope="col">Nivel De Estudio</th>
						<tr/>

				 	</thead>
				 	
				 	<tbody id="bodytable">
				 		
				 	</tbody>
				 </table>
					
			  </div>
			</div>
			<div class="col-md-12">
				<button class="btn btn-primary">
					Cargar Planilla
				</button>
			</div>
		</form>
	</div>


	<template id="template" >
			 <tr>
		     
		      <td><input  type="date"  name="Fecha_Nacimiento[]" class="form-control" ></td>
		      <td><input  type="date"  name="Fecha_De_Defuncion[]" class="form-control" ></td>
		      <td><input  type="text"  name="Nombre_Apellido[]" class="form-control" ></td>
		      <td><input type="text" class="form-control"  name="nombre[]"></td>
		      <td><input  type="text"  class="form-control" name="Cedula[]">	</td>
		      <td><input  type="text"  class="form-control" name="Edad[]"></td>
		      <td>
		      	<select  name="nivel_estudio[]" class="form-select" >
							<option value="Basico">
								basico
							</option>
							<option value="Superior">
								Superior
							</option>
				</select>
				</td>
		      
		    </tr>
	</template>
	<template id="template2">
			 <tr>
		     
		      <td><input  required type="date"  name="Fecha_Nacimiento[]" class="form-control" ></td>
		      <td><input required type="text"  name="Nombre_Apellido[]" class="form-control" ></td>
	
		     
		      <td><input required  type="text"  class="form-control" name="Cedula[]">	</td>
		      <td><input required  type="text"  class="form-control" name="Edad[]"></td>
		      <td>
		      	<select required  name="nivel_estudio[]" class="form-select" >
							<option value="Basico">
								basico
							</option>
							<option value="Superior">
								Superior
							</option>
						</select>
				</td>
		      
		    </tr>
	</template>	

	<template id="thead1" >
		<tr>
			<th scope="col">Fecha Nacimiento</th>
			<th scope="col">Fecha De Defuncion</th>
			<th scope="col">Nombre y Apellido</th>
			<th scope="col">nombre</th>
			<th scope="col">Cedula</th>
			<th scope="col">Edad</th>
			<th scope="col">Nivel De Estudio</th>
		<tr/>
	</template>
	<template id="thead2">
		<tr>
			<th scope="col">Fecha Nacimiento</th>			
			<th scope="col">Nombre y Apellido</th>
			
			<th scope="col">Cedula</th>
			<th scope="col">Edad</th>
			<th scope="col">Nivel De Estudio</th>
		<tr/>
	</template>
	
	<script type="text/javascript">
		var stipo = 0
		
		var tableb = document.querySelector('#tableb')
		solisitud.addEventListener('change' , e =>{
			
			stipo = e.target.value
			headtable.innerHTML =''
			  
			if(e.target.value == 2)
			{
				thead = thead1.content.cloneNode(true)
				return headtable.appendChild(thead)
			}else
			{
				thead = thead2.content.cloneNode(true)
				return headtable.appendChild(thead)
			}
			

		})
	
		agregar.addEventListener('click' , e=>{
			

			if(stipo == 2){
				node = template.content.cloneNode(true)
				bodytable.appendChild(node)
			}

			if(stipo !=2){
			    node = template2.content.cloneNode(true)
				bodytable.appendChild(node)
			}
		})
	</script>
	<style>
		.container-carga{
			margin: 10px 0;
			border: solid 1px black;
		}

		.formulario{
			box-shadow: 30px 30px 10px rgba(0, 0, 0, .8);
			width:80%;
			margin: auto;
			margin-top: 20px;
			margin-bottom: 50px;
			padding: 10px;
			border-radius: 5px;
		}
	</style>
@endsection