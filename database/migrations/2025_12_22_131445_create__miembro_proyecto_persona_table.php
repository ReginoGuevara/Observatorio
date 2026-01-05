<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proy_miembros', function (Blueprint $table) {
            // Nombres CORRECTOS y CONSISTENTES
            $table->integer('proyecto_id');           // ← NOMBRE CORRECTO
            $table->integer('persona_id');            // ← NOMBRE CORRECTO (sin __)
            $table->string('rol', 250);
            
            // Foreign keys que referencian columnas que SÍ existen
            $table->foreign('proyecto_id')            // ← MISMO NOMBRE que la columna
                  ->references('proyecto_id')
                  ->on('proyecto')
                  ->onDelete('cascade');
                  
            $table->foreign('persona_id')             // ← MISMO NOMBRE que la columna  
                  ->references('persona_id')
                  ->on('persona')
                  ->onDelete('cascade');
            
            // Primary key con columnas que SÍ existen
            $table->primary(['proyecto_id', 'persona_id']);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proy_miembros');  // ← MISMO NOMBRE que en create
    }
};