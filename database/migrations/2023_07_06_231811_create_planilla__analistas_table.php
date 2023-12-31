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
        Schema::create('planilla__analistas', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre_Completo');
            $table->string('Apellido_Completo');
            $table->integer('Cedula');
            $table->string('Codigo');
            $table->string('Cargo');
            $table->string('Direccion');
            $table->string('pago_nominal');
            $table->string('Dependencia_Nominal');
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
        Schema::dropIfExists('planilla__analistas');
    }
};
