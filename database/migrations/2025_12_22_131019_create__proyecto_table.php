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
        Schema::create('proyecto', function (Blueprint $table) {
            $table->integer('proyecto_id')->primary();
            $table->string('codigo', 255);
            $table->string('acronimo', 250)->nullable();
            $table->date('fecha_de_inicio');
            $table->date('fecha_finalizacion');
            $table->string('pagina_web', 250);
            $table->boolean('mandato');
            $table->string('uri', 250);
            
            // Foreign keys
            $table->integer('tipo_proyecto_cod__tipo_cod')->nullable();
            $table->integer('categoria_cod')->nullable();
            $table->integer('estado_cod')->nullable();
            
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('tipo_proyecto_cod__tipo_cod')
                  ->references('tipo_cod')
                  ->on('_tipo_proyecto_cod')
                  ->onDelete('set null');
                  
            $table->foreign('categoria_cod')
                  ->references('categoria_cod')
                  ->on('categoria_proyecto_cod')
                  ->onDelete('set null');
                  
            $table->foreign('estado_cod')
                  ->references('estado_cod')
                  ->on('estado_proyecto_cod')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
};
