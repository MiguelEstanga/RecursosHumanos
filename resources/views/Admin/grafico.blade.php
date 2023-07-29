@extends('layouts.app')

@section('contenido')
<div class="container con ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark  ">
                <div class="card-header">Reporte De Actas</div>

                <div class="card-body">

                    <h1 class="text-white " >{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}

                </div>

            </div>
        </div>
    </div>
</div>

@section('script')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection
@endsection

<style>
    .con{
        margin-top: 70px;
    }
</style>