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
        Schema::create('cliente_proyecto', function (Blueprint $table) {
           $table->integer('proyecto_cliente_o_usuario_proyecto');
            $table->integer('persona__persona_id');
            
            // Claves foráneas
            $table->foreign('proyecto_cliente_o_usuario_proyecto')
                  ->references('proyecto_id')
                  ->on('proyecto')
                  ->onDelete('cascade');
                  
            $table->foreign('persona__persona_id')
                  ->references('persona_id')
                  ->on('persona')
                  ->onDelete('cascade');
            
            // Clave primaria compuesta
            $table->primary(['proyecto_cliente_o_usuario_proyecto', 'persona__persona_id']);
            
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
        Schema::dropIfExists('_cliente_o_usuario_proyecto_persona');
    }
};
