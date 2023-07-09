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
            ['estado' => 'De_Vuelta'],
            ['estado' => 'Verificado'],
            ['estado' => 'Aprobado']
        ];

        $tsolisitud = [
            ['Tipo_Solisitud' => 'Nacimiento_De_Hijo']
        ];

        User::create([
            'name' => "Miguel",
            "email" => 'recursoshumanos@gmail.com',
            'password'=> bcrypt('123456789') ,
            'apellido' => "Barcamonte",
            'cedula'=> 24864260
        ])->assignRole('SuperAdministrador');
        \App\Models\User::factory(0)->create();



       


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
