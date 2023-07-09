<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
   public function login(){    
            return view('RHumanos.login');
   }

    public function auth(Request $request){
        
        $credenciales = $request->validate([ 
            "email" => ['required' , 'email' , 'string'] , 
            "password"=> ['required']
        ]);
        
        if( Auth::attempt($credenciales) ){
            $request->session()->regenerate();

            return redirect('/inicio');
        }
        
         return redirect()->route('login')->with('login' , 'los datos ingresado son incorrectos') ;
    }


    public function registrar(){
        return view('RHumanos.registro');
    }

    public function registrando(Request $request){
        $request->validate(
            [
                'name'=> 'required|max:255',
                'email' => 'required|email|unique:users,email|max:255',
                'cedula' => 'required|integer|unique:users,cedula',
                'name' => 'required|max:255',
                'apellido' => 'required|max:255',
                'password'=> 'required',
                'password_confirm' => 'required|same:password'           
            ]
        );
        
    $user =  User::create([
            'name' => $request->name ,
            'apellido' => $request->apellido,
            'password' => bcrypt( $request->password ),
            'email' => $request->email,
            'cedula'=> $request->cedula
        ])->assignRole('Usuario');

        return redirect('/')->with('mensage' , 'su registro fue exitoso '.$request->email  ) ;
    }

}