<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;
class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $Role1 =  Role::create(["name" => "Administrador"]);
      $Role2 =  Role::create(["name" => "Usuario"]);
      $Role3 =  Role::create(["name" => "SuperAdministrador"]);
      $Role4 =  Role::create(["name" => "Gerente"]);
      $Role5 =  Role::create(["name" => "Desabilitado"]);

      //trabajador  y usuario -> permiso crear planilla 
      //superadmin 
      //repotte mensual 
      // usuario genera solocitudes 
      //gerente puede crear tipos de solitudes 
      //mensage director cordinador 
      //organizar

      //por nacimiento
      //por defuncion
      //defuncion de trabjadores o carga familiar 
      //juguetes // no incliye nivel de estudio
      

      Permission::create(['name' => 'superadmin' ])->assignRole($Role3);
      Permission::create(['name' => 'admin'])->syncRoles([$Role1 ,  $Role3]);
      Permission::create(['name' => 'public'])->syncRoles([$Role1 , $Role2 , $Role3]);

     
    }
}
