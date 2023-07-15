<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Models\PlanillaBeneficiario;
class UserController extends Controller
{
    
    public function index(){
        $misplanillas = PlanillaBeneficiario::all();
        return view('usuario.index' , 
            [
                'misplanillas' => $misplanillas
            ]

        );
    }


}
