<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Use raw statements to avoid requiring doctrine/dbal for column changes.
        DB::statement("ALTER TABLE persona MODIFY genero VARCHAR(32) NULL;");
        DB::statement("ALTER TABLE persona MODIFY domicilio TEXT NULL;");
        DB::statement("ALTER TABLE persona MODIFY documento_nacional_identidad VARCHAR(32) NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE persona MODIFY genero VARCHAR(32) NOT NULL;");
        DB::statement("ALTER TABLE persona MODIFY domicilio TEXT NOT NULL;");
        DB::statement("ALTER TABLE persona MODIFY documento_nacional_identidad VARCHAR(32) NOT NULL;");
    }
};
