<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\PlanillaBeneficiario;
use App\Models\TipoDesolicirures;
use App\Models\CargaFamiliar;
use App\Models\TipoDesolisitudes;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;



class PlanillaBenefisiarioController extends Controller
{
    
    public function index()
    {
        $usuario = User::find(1);
        return $usuario->planillas[6]->carga;
    }

    public function create(){
        $solisitudes = TipoDesolisitudes::all();
        return view('Planillas.create' , ['solisitudes' => $solisitudes]);
    }

    public function store(Request $request)
    {
        date_default_timezone_set('America/Caracas');
       
        $request->validate(
            [
                'Nombre_Completo' => 'required',
                'Apellido_Completo' => 'required',
                'Cedula_beneficiario' => 'required',
                'telefono' => 'required',
                'Cargo' => 'required',
                'Direccion' => 'required',
            ]

        );

       $familiares = [];
      

       if($request->solisitud == 1 || $request->solisitud == 2 ){
         if( gettype($request->Fecha_Nacimiento) == "NULL" ){
            return redirect('planilla_benefisiario_crear')->with('mensage' , '¡Por favor, llene la carga familiar!');
         }   
         
       }

       if(    gettype($request->Fecha_Nacimiento) == "NULL" )
       {
            $familiares[0] = array(
                'Fecha_Nacimiento' =>"No aplica",
                'Fecha_De_Defuncion' => 'No aplica',
                'nombre' => 'No aplica',
                'Cedula' => 'No aplica',
                'Edad' => 'No aplica',
                'nivel_estudio' => 'No aplica'

            );
       }else{
            
            for($i = 0 ; $i< count($request->Fecha_Nacimiento) ;  $i++){
                    $familiares[$i] = array(
                            'Fecha_Nacimiento' => $request->Fecha_Nacimiento[$i],
                            'Fecha_De_Defuncion' => $request->solisitud == 2 ? $request->Fecha_De_Defuncion[$i] : 'no tiene' ,
                            'nombre' => $request->Nombre_Apellido[$i],
                            'Cedula' => $request->Cedula[$i],
                            'Edad' => $request->Edad[$i],
                            'nivel_estudio' => $request->nivel_estudio[$i]
                        
                    );
            } 
        }
     
       $registro = PlanillaBeneficiario::create([
            'Nombre_Completo' => $request->Nombre_Completo,
            'Apellido_Completo' => $request->Apellido_Completo,
            'Cedula' => $request->Cedula_beneficiario,
            'Codigo' => rand(1, 1000000),  
            'hora' =>  date(  'h:i:s') ,
            'Cargo'=> $request->Cargo,
            'Direccion' => $request->Direccion ,
            'Dependencia_Nominal' => 'Dependencia Nominal',
            'id_usuario' => Auth::user()->id ,         
            'id_tsolisitud' => $request->solisitud ,
            'id_estado' => 1
        ]);


        

       for ($i = 0; $i < count($familiares) ; $i++) 
       {
       
            $registro->carga()->create(
                [
                    'Fecha_Nacimiento' => $familiares[$i]['Fecha_Nacimiento'],
                    'cedula' =>  $familiares[$i]['Cedula'],
                    'Nivel_Estudio' => $familiares[$i]['nivel_estudio'],
                    'Fecha_De_Defuncion' => $familiares[$i]['Fecha_De_Defuncion'] ,
                    'edad' => $familiares[$i]['Edad'],
                    //'id_planilla' => $registro->id,
                    'Nombre_Apellido' => $familiares[$i]['nombre']
                ]
            )->save();
       }

        return redirect()->route('desboart')->with("mensage" , 'Su planilla se creó y ha sido enviada para su revisión con el analista. ');

    }


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

    public function destroy($id)
    {
       $registro =  PlanillaBeneficiario::find($id)->delete();
       return redirect()->route('desboart')->with('mensage' , 'Se ha eliminado el registro de la planilla satisfactoriamente');   
    }



}
