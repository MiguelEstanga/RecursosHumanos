<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDesolisitudes extends Model
{
    use HasFactory;

    public function planillas(){
        return $this->hasMany(PlanillaBeneficiario::class , 'id_tsolisitud');
    }
}
