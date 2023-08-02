<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanillaBeneficiario extends Model
{
    use HasFactory;
    protected $fillable = [
        'carga_familiar',
        'Nombre_Completo' ,
        'Tipo_De_Solocitud' ,
        'Codigo',
        'Cargo'  ,
        'Direccion' ,
        'Cedula',
        'Apellido_Completo' ,
        'Dependencia_Nominal',
       'hora',
        'id_estado',
        'id_usuario',
        'id_tsolisitud'
    ];

 

    public function TipoDeSolisitud() 
    {
        return $this->belongsTo(TipoDesolisitudes::class , 'id_tsolisitud');
    }

    public function estado ()
    {
        return $this->belongsTo(Estado::class , 'id_estado');
    }

     public function user ()
    {
        return $this->belongsTo(User::class , 'id_usuario');
    }

    public function carga(){
        return $this->hasMany(CargaFamiliar::class , 'id_planilla');
    }

    public function mensage()
    {
        return $this->belongsTo(  RespuestaPlanilla::class , 'id_planilla');
    }
  
}
