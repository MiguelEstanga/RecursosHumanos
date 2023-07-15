<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    use HasFactory;

    protected $fillable = 
    [

        'Fecha_Nacimiento',
        'cedula' ,
                    'Nivel_Estudio' ,
                    'Fecha_De_Defuncion' ,
                    'edad' ,
                    'id_planilla',
                    'Nombre_Apellido'
    ];
}
