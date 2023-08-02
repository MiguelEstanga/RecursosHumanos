@extends('layouts.app')	

@section('contenido')

	<div class=" contenido">

		@foreach($planillas as $planilla)
			<x-plnilla-carts  :planilla="$planilla" />
		@endforeach
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
	</style>
@endsection