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
        Schema::create('respuesta_planillas', function (Blueprint $table) {
            $table->id();

            $table->string('comentario');
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
        Schema::dropIfExists('respuesta_planillas');
    }
};
