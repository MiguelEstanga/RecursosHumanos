<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Estado;
use App\Models\TipoDesolisitudes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
 
        $this->call(roles::class); 

        $estados = [
            ['estado' => 'Enviada'],
            ['estado' => 'De Vuelta'],
            ['estado' => 'Verificado'],
            ['estado' => 'Aprobado'],
            ['estado' => 'Denegada']
        ];

        $tsolisitud = [
           
            ['Tipo_Solisitud' => 'Nacimiento De Hijo'],
            ['Tipo_Solisitud' => 'Acta De Defuncion']
        ];

        User::create([
            'name' => "Miguel",
            "email" => 'recursoshumanos@gmail.com',
            'password'=> bcrypt('123456789') ,
            'apellido' => "Bracamonte",
            'cedula'=> 24864260
        ])->assignRole('SuperAdministrador');
        


       


        foreach($estados as $estado)
        {
            Estado::create(
                [
                    'estado' => $estado['estado']
                ]
            )->save();
        }


        foreach($tsolisitud as $solisitud)
        {
            TipoDesolisitudes::create(
                [
                    'Tipo_Solisitud' => $solisitud['Tipo_Solisitud']
                ]
            )->save();
        }
    }
}
