<?php

namespace App\Http\Controllers\Planillas;

use App\Http\Controllers\Controller;
use App\Models\PlanillaBeneficiario;
use Illuminate\Http\Request;
use Illuminate\Support\Arr; 
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;

class BeneficiosController extends Controller
{

    public function index()
    {
        $plantilla = PlanillaBeneficiario::all();
        return view('Planillas.Beneficios', ['planillas' => $plantilla]);
    }

    public function solicitudes()
    {
        $plantilla = PlanillaBeneficiario::orderBy('created_at', 'desc')->get();
        return view('Planillas.Todas', ['planillas' => $plantilla]);
    }


    public function busqueda( Request $request)
    {  
       $busqueda = PlanillaBeneficiario::where('Cedula' , "=" , $request->cedula)->first();
      
       return view('Planillas.busqueda', ['busqueda' => $busqueda]);

    }

    public function store(Request $request)
    {
  
       
        $familiares = [];
       //limpiamos el array de datos innecesarion
        for ($i = 0; $i <= 8; $i++) {
            if ($request->Nombre_Apellido_Familiar[$i] != null) {
                $familiares[$i] = array(
                    'nombre_apellido' => $request->Nombre_Apellido_Familiar[$i],
                    'cedula' => $request->Cedula_Familiar[$i],
                    'fecha_nacimiento' =>  $request->Fecha_Nacimiento_Familiar[$i],
                    'estudios' => $request->Nivel_Estudio[$i]
                );
            }
        }
        //creamos una nueva solicitud
        $new =  PlanillaBeneficiario::create([
            'Nombre_Completo' => $request->Nombre_Completo,
            'Tipo_De_Solocitud' => $request->Tipo_De_Solicitud,
            'Cedula' => $request->Cedula_Identidad,
            'Cargo'  => $request->Cargo,
            'Direccion' => $request->Direccion,
            'Apellido_Completo' => $request->Apellido_Completo,
            'Cedula' => $request->Cedula_Identidad,
            'Codigo' => $request->codigo,
            'Dependencia_Nominal' => $request->Dependencia_Nominal,
            'carga_familiar' => json_encode($familiares)
        ]);

        $new->save();
        return redirect('/inicio')->with('mensage', 'tu peticion a sido enviada con exito');
    }

    // esta funcion es para ver los registro de las plantillas en el pdf
    public function show($id)
    {
        $options = [
            'enable_css_auto_load' => true,
            'defaultFont'=> 'Courier',
            'isHtml5ParserEnabled' =>  true
        ];

        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif' ,'enable_css_auto_load' => true ]);
        //buscamos el registro de la planilla para poder visualizar de forma individual
        $registro =  PlanillaBeneficiario::find($id);

        //un objeto json con la infomacion de la carga familiar que esta en la base de datos
        $cargafamiliar = json_decode($registro->carga_familiar, true);
       
        // imprimimos la vista pero ahora en fonma de formato pdf
        $pdf = Pdf::loadView(
            'Planillas.BeneficiarioShow',
            ['registro' => $registro, 'cargafamiliar' => $cargafamiliar]
        )->setPaper('letter', 'portrait')
        ->setOptions($options);

        return $pdf->stream('planilla.pdf');
    }

    
    public function edit($id)
    {
        $editar = PlanillaBeneficiario::find($id);
        $cargafamiliar = json_decode($editar->carga_familiar, true);
        $caraga = array();

        
        return view('Planillas.Editar', ['planillas' => $editar  , 'cargafamiliar' => $cargafamiliar ]);
    }

   
    public function update(Request $request, $id)
    { 
        $busqueda = PlanillaBeneficiario::find($id);
        $familiares = [];
        //limpiamos el array de datos innecesarion
         for ($i = 0; $i <= 8; $i++) {
             if ($request->Nombre_Apellido_Familiar[$i] != null) {
                 $familiares[$i] = array(
                     'nombre_apellido' => $request->Nombre_Apellido_Familiar[$i],
                     'cedula' => $request->Cedula_Familiar[$i],
                     'fecha_nacimiento' =>  $request->Fecha_Nacimiento_Familiar[$i],
                     'estudios' => $request->Nivel_Estudio[$i]
                 );
             }
         }
        $busqueda->Nombre_Completo = $request->Nombre_Completo;
        $busqueda->Tipo_De_Solocitud = $request->Tipo_De_Solicitud;
        $busqueda->Cedula = $request->Cedula_Identidad;
        $busqueda->Cargo  = $request->Cargo;
        $busqueda->Direccion = $request->Direccion;
        $busqueda->Apellido_Completo = $request->Apellido_Completo;
        $busqueda->Cedula = $request->Cedula_Identidad;
        $busqueda->Codigo = $request->codigo;
        $busqueda->Dependencia_Nominal = $request->Dependencia_Nominal;
        $busqueda->carga_familiar = json_encode($familiares);
        $busqueda->save();
        return redirect('/solicitudes')->with('mensage' , 'se actulizo el registro con la cedula de identidad'. $busqueda->Cedula );
    }

    //aqui eliminamos la planilla que ya no necesitemos 
    public function destroy($id)
    {
            
         PlanillaBeneficiario::find($id)->delete();

         return redirect('/solicitudes')->with('mensage' , 'se a eliminado un registro');
    }
}
