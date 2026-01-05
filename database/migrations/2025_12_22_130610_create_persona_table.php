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
        Schema::create('persona', function (Blueprint $table) {
            $table->integer('persona_id')->primary();
            $table->string('nombres', 128);
            $table->string('apellidos', 250);
            $table->string('genero', 32);
            $table->binary('foto')->nullable();
            $table->text('domicilio');
            $table->string('documento_nacional_identidad', 32);
            $table->text('orcid')->nullable();
            $table->text('identificador_registro_personas')->nullable();
            $table->text('scopus_author_id')->nullable();
            $table->text('research_id')->nullable();
            $table->text('isni')->nullable();
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
        Schema::dropIfExists('persona');
    }
};
