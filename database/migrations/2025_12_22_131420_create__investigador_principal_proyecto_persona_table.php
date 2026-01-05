<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proy_invest_principal', function (Blueprint $table) {
            // Columnas con nombres claros
            $table->integer('proyecto_id');
            $table->integer('investigador_id');  // ← Más claro que 'persona_id'
            
            // Fecha de asignación como investigador principal
            $table->date('fecha_asignacion')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->string('responsabilidad', 255)->nullable();
            
            // Foreign keys con nombres EXPLÍCITOS y CORTOS
            $table->foreign('proyecto_id', 'fk_proy_inv_proy')
                  ->references('proyecto_id')
                  ->on('proyecto')
                  ->onDelete('cascade');
                  
            $table->foreign('investigador_id', 'fk_proy_inv_per')
                  ->references('persona_id')
                  ->on('persona')
                  ->onDelete('cascade');
            
            // Primary key
            $table->primary(['proyecto_id', 'investigador_id'], 'pk_proy_invest');
            
            $table->timestamps();
            
            // Índices adicionales
            $table->index('proyecto_id', 'idx_proy');
            $table->index('investigador_id', 'idx_invest');
        });
    }

    public function down()
    {
        Schema::dropIfExists('proy_invest_principal');
    }
};