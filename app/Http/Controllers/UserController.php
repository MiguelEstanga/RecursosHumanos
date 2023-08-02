<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Models\PlanillaBeneficiario;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    
    public function index(){
        $misplanillas = PlanillaBeneficiario::where('id_usuario' , Auth::user()->id )->orderBy("created_at" , 'desc')->get();
        
        return view('usuario.index' , 
            [
                'misplanillas' => $misplanillas
            ]

        );
    }


}
