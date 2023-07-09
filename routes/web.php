<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanelUsuariosController;
use App\Http\Controllers\Planillas\BeneficiosController;
use App\Http\Controllers\Session\SessionController;
use App\Http\Controllers\PlanillaBenefisiarioController;

use Illuminate\Support\Facades\Route;


//rutas para las planillas 

Route::get('/planilla_benefisiario' ,  [PlanillaBenefisiarioController::class , 'index'] )->name('planillabeneficiario.index');


Route::get('/planilla_benefisiario_prueba' ,  [PlanillaBenefisiarioController::class , 'store'] )->name('planillabeneficiario.store');

Route::get('/planilla_benefisiario_crear' ,  [PlanillaBenefisiarioController::class , 'create'] )->name('planillabeneficiario.create');

Route::get('/iniico' , [''])->name('inicio');


//aqui van a ir las rutas con restriscciones y permisos 
/**
Route::group( ['middleware' => 'auth']  , function(){
   
   
});**/


//aqui el login y registro 

Route::get('/', [SessionController::class , 'login'] )->name('login');
Route::post('/', [SessionController::class , 'auth'] )->name('auth');

Route::get('/registrar', [SessionController::class , 'registrar'] )->name('home');
Route::post('/registrando', [SessionController::class , 'registrando'] )->name('registroUsuario');




