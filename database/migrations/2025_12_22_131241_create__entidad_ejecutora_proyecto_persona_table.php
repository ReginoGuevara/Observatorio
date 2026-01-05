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
        Schema::create('ejecutora_proyecto', function (Blueprint $table) {
            $table->integer('proyecto_enitidad_ejecutora_proyecto');
            $table->integer('persona__persona_id');
            
            $table->foreign('proyecto_enitidad_ejecutora_proyecto')
                  ->references('proyecto_id')
                  ->on('proyecto')
                  ->onDelete('cascade');
                  
            $table->foreign('persona__persona_id')
                  ->references('persona_id')
                  ->on('persona')
                  ->onDelete('cascade');
            
            $table->primary(['proyecto_enitidad_ejecutora_proyecto', 'persona__persona_id']);
            
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
        Schema::dropIfExists('_entidad_ejecutora_proyecto_persona');
    }
};
