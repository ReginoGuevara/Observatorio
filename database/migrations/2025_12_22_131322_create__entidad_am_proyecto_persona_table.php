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
        Schema::create('entidad_am_proyecto', function (Blueprint $table) {
            $table->integer('proyecto_proyecto_id');
            $table->integer('persona__persona_id');
            
            $table->foreign('proyecto_proyecto_id')
                  ->references('proyecto_id')
                  ->on('proyecto')
                  ->onDelete('cascade');
                  
            $table->foreign('persona__persona_id')
                  ->references('persona_id')
                  ->on('persona')
                  ->onDelete('cascade');
            
            $table->primary(['proyecto_proyecto_id', 'persona__persona_id']);
            
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
        Schema::dropIfExists('entidad_am_proyecto');
    }
};
