<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
class UserController extends Controller
{
    public function index(){
    
        return view('usuario.index');
    }


}
