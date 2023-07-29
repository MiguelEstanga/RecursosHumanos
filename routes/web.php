<?php


use App\Http\Controllers\PanelUsuariosController;
use App\Http\Controllers\Planillas\BeneficiosController;
use App\Http\Controllers\Session\SessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PlanillaBenefisiarioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Solisitud\TipoDeSolisitudController;
use App\Http\Controllers\Anuncio\AnuncioController;

//rutas para las planillas 

Route::get('/planilla_benefisiario' ,  [PlanillaBenefisiarioController::class , 'index'] )->name('planillabeneficiario.index');


Route::group(['middleware' => 'can:admin' , 'middleware' => 'auth'], function(){
   



} );

//rutas con el midellwae auth
Route::group( ['middleware' => 'auth' , 'middleware' => 'can:public']  , function()
{


    Route::get('Perfil' , [UserController::class , 'index'])->name('desboart');
    Route::get('/planilla_benefisiario_crear' ,  [PlanillaBenefisiarioController::class , 'create'] )->name('planillabeneficiario.create');

    Route::post('/planilla_benefisiario_crear' ,  [PlanillaBenefisiarioController::class , 'store'] )->name('planillabeneficiario.store');

     Route::delete('planilla/{id}/eliminar' , [PlanillaBenefisiarioController::class , 'destroy'])->name('planillabeneficiario.delete');  

    Route::resource('inicio' , AnuncioController::class )->names('anuncion');

});

Route::group(['middleware' => 'auth' , 'middleware' => 'can:admin'], function ()
{

Route::get('Usuarios' , [AdminController::class , 'index'])->name('Usuario.index');
Route::get('Usuarios/{id}/Editar' , [AdminController::class , 'update'])->name('Usuario.update');

Route::put('Usuarios/{id}/Actulzando' , [AdminController::class , 'put'])->name('Usuario.put');

Route::get('TodasLasPlanillas' , [AdminController::class , 'planillas'])->name('planillas.all');

Route::get('VerPlanilla/{id}' , [AdminController::class , 'planillashow'])->name('planilla.show.admin');

Route::get('Responder/{id}' , [AdminController::class , 'responder'])->name("planilla.respuesta");

Route::post('Responder/{id}/repondiendo' , [AdminController::class , 'procesarRespuesta'])->name("planilla.respuesta.admin");


//para crear las solistud
Route::get("reporte" , [AdminController::class , 'reporte'])->name('reporte');

Route::post("reporte" , [AdminController::class , 'reporte_id'])->name('reporte_solisitud');



Route::delete("eliminarusuario/{id}" , [AdminController::class , 'eliminarUsuario'])->name('usurio.delete');

Route::delete("eliminando_planillas_usuario/{id}" , [AdminController::class , 'eliminar_planillas_usuarios'])->name('usurio.delete_planillas');

Route::resource('solisitud'  , TipoDeSolisitudController::class )->names('solisitudes');
});




Route::get('/', [SessionController::class , 'login'] )->name('login');
Route::post('/', [SessionController::class , 'auth'] )->name('auth');

Route::get('/registrar', [SessionController::class , 'registrar'] )->name('home');
Route::post('/registrando', [SessionController::class , 'registrando'] )->name('registroUsuario');

Route::post('/cerrar_sesion', [SessionController::class , 'cerrar_sesion'] )->name('cerrar_sesion');




