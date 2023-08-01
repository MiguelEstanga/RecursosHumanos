 <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(){
        return view('RHumanos.registro');
    }

    public function create(Request $request){
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
        ])->assignRole(1);

        return redirect('/')->with('mensage' , 'Su registro fue exitoso '.$request->email  ) ;
    }
    //editar usuario
  


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
         
         return redirect()->route('login')->with('login' , 'Los datos ingresados son incorrectos') ;
    }

    public function logout(Request $request){
        
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");   
        
    }
}
