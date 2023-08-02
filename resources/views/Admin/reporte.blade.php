@extends("layouts.app")

@section('contenido')
	<div class="container-sm">
		<h2>
			Generar Reporte
		</h2>

		<div class="container bg-dark text-white p-4 rounded">
			<form action="{{route('reporte_solisitud'   ) }}" method="post">
				@csrf
				<div class="row g-3 mb-4 " >
					<label for="" class="form-label">
						Días 
					</label>
					<input type="number" required class="form-control" name="dias" >
				</div>
				<label for="barra">Tipo de Gráfico</label>
				<select class="form-control" name="barra" id="barra">
					<option value="pie">
						Pastel
					</option>
					<option value="bar">
						Barra
					</option>
					
					<option value="line">
						Línea
					</option>
				</select>
				
				<button onclick="grafico()" class="btn btn-outline-success text-white mt-4">
					Generar Reporte
				</button>
			</form>
		

		</div>
	</div>	

	
@endsection