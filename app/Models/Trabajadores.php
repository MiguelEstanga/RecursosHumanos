<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;

class Trabajadores extends Model
{
    use HasFactory;
    use HasRoles;

    
      public function planillas()
    {
        return $this->belongsTo( PlanillaBenficiario::class , 'id_trabajador' );
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
