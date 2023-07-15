<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use App\Models\Estado;
use App\Models\Anuncion;
        use App\Models\PlanillaBeneficiario;

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
        return $usuario->role;
    }


    public function planillas()
    {
        $planillas = PlanillaBeneficiario::all();

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
        $planilla = PlanillaBeneficiario::find($id);

        //return $planilla->estado;
        $planilla->id_estado = $request->estado;
        $planilla->mensage = $request->mensage;
        $planilla->save();


        return redirect()->route('planillas.all')->with('mensage' , 'mensage enviado exitosamente');
    }


    public function mensage()
    {
        return view('registrados.index' , ['anuncion' => Anuncion::all()]);
    }
}
