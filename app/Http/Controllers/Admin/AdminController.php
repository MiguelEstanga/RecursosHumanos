<?php

namespace App\Http\Controllers\Admin;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use App\Models\Estado;
use App\Models\Anuncion;
use App\Models\PlanillaBeneficiario;
use App\Models\TipoDesolisitudes;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('Admin.index' , ['usuarios' => $user]);
    }

    public function update($id)
    {
        $usuario = User::find($id);
        $roles = Role::where('id' , '!=' , '3')->get();
        return view('Admin.update' , ['usuario' => $usuario , 'Role' => $roles]);
    }



    public function put(Request $request , $id)
    {
        $usuario = User::find($id);

        $usuario->name = $request->name;
        $usuario->apellido = $request->apellido;
        $usuario->cedula = $request->cedula;
        $usuario->email = $request->email;

        $usuario->removeRole( $usuario->getRoleNames()[0] );
        $usuario->assignRole($request->role);
        $usuario->save;
               return redirect()->route('Usuario.index');

    }

    public function eliminarUsuario($id)
    {
        $usuario =  User::find($id);
        
        if($usuario->planillas ?? false )
        {
                foreach($usuario->planillas as $planillas)
                {
                   $planillas->delete();     
                }  
        }
        
       

        $usuario->delete();
        return redirect()->route('Usuario.index');
    }

    public function eliminar_planillas_usuarios($id)
    {
        $usuario =  User::find($id);
        
        if( count( $usuario->planillas)>0 )
        {
                foreach($usuario->planillas as $planillas)
                {
                   $planillas->delete();     
                }  
        }

        return redirect()->route('Usuario.index');

    }

    public function planillas()
    {
        $planillas = PlanillaBeneficiario::where('id_usuario' , '!=' , Auth::user()->id )
        ->orderBy('created_at' , 'desc')                                                    
        ->get();

        return view("Admin.todaslasplanillas" , ['planillas' => $planillas ]);
    }

    public function planillashow($id)
    {
        $options = [
            'enable_css_auto_load' => true,
            'defaultFont'=> 'Courier',
            'isHtml5ParserEnabled' =>  true
        ];
        $planilla =  PlanillaBeneficiario::find($id);
        //return $planilla;    

        $pdf = Pdf::loadView(
            'Admin.show',
            ['registro' => $planilla]
        )
        ->setPaper('letter', 'portrait')
        ->setOptions($options);


        return $pdf->stream('planilla.pdf');  
    }

    public function responder($id)
    {
        $planilla =  PlanillaBeneficiario::find($id);
        $estados = Estado::all();
        return view('Admin.responder' , ['planilla' => $planilla  , 'estados' => $estados] )  ;
    }

    public function procesarRespuesta(Request $request , $id)
    {
        if($request->estado == 'null'){
            return redirect()->route('planilla.respuesta' , $id)->with('opcion'  , '¡Selecciona la respuesta a la planilla!' );
        }
         
        $request->validate([
            'mensage' => 'required'
        ]);

        $planilla = PlanillaBeneficiario::find($id);

        //return $planilla->estado;
        $planilla->id_estado = $request->estado;
        $planilla->mensage = $request->mensage;
        $planilla->save();


        return redirect()->route('planillas.all')->with('mensage' , 'Respuesta tramitada exitosamente.');
    }


    public function mensage()
    {
        return view('registrados.index' , ['anuncion' => Anuncion::all()   ]);
    }

    public function reporte()
    {
        $solisitudes = TipoDesolisitudes::all();
        


        return view('Admin.reporte' , 
            [
                'solisitudes'  => $solisitudes,
               
            ] 
        );
    }
//esto es para el reporte
      public function reporte_id(Request $request)
    {
        
       
        $solicitud = PlanillaBeneficiario::where('id_tsolisitud', $request->filtro)
                ->whereMonth('created_at',now()->month($request->mes) )
                ->get();
       
        
       $chart_options = [
            'chart_title' => 'Reporte De Los Ultimos '.$request->dias.' Dias ',
            'chart_type' => $request->barra,
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\PlanillaBeneficiario',

            'relationship_name' => 'TipoDeSolisitud', // represents function user() on Transaction model
            'group_by_field' => 'Tipo_Solisitud', // users.name

           
            
            'filter_field' => 'created_at',
            'filter_days' => $request->dias, // show only transactions for last 30 days
           // 'filter_period' => 'week', // show only transactions for this week
        ];
        $chart1 = new LaravelChart($chart_options);
         

        $planillas = PlanillaBeneficiario::whereBetween('created_at', [$request->Desde, $request->Hasta])
            ->get();

        return view('Admin.grafico' ,['chart1' => $chart1  ]);
    }
}
