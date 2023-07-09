<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanillaBeneficiario;
use App\Models\TipoDesolicirures;
use App\Models\CargaFamiliar;
use App\Models\TipoDesolisitudes;
use App\Models\User;


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

    public function store()
    {
       $registro = PlanillaBeneficiario::create(
        [
            'Nombre_Completo' => 'Miguel Alejandro',
            'Apellido_Completo' => "Estanga Martinez",
            'Cedula' => '26101877',
            'Codigo' => '2211',
            'Cargo' => 'Ing Sistema',
            'Direccion' => 'Los coco 04263921517',
            'Dependencia_Nominal' => 'Nominal',
            'id_usuario' => 1 ,         
            'id_tsolisitud' => 1 ,
            'id_estado' => 1
        ]);


       for($i =  0  ; $i<3 ; $i++){
            CargaFamiliar::create(
                [
                    'Fecha_Nacimiento' => '22/01/1998',
                    'cedula' => '26101877',
                    'Nivel_Estudio' => 'superior',
                    'Fecha_De_Defuncion' => 0 ,
                    'edad' => 25,
                    'id_planilla' => $registro->id
                ]
            )->save();
       }

        return $registro;

    }

}
