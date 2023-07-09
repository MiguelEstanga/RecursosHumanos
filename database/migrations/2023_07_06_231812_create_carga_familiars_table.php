<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga_familiars', function (Blueprint $table) {
            $table->id();
            $table->string('Fecha_Nacimiento');
            $table->string('Cedula');
            $table->string('Nivel_Estudio');
            $table->string('Fecha_De_Defuncion');
            $table->string('edad');

            $table->foreignId('id_planilla')
            ->nullable()
            ->constrained('planilla_beneficiarios')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carga_familiars');
    }
};
