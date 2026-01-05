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
        Schema::table('persona', function (Blueprint $table) {
            if (!Schema::hasColumn('persona', 'email')) {
                $table->string('email')->nullable()->after('apellidos');
            }
            if (!Schema::hasColumn('persona', 'telefono')) {
                $table->string('telefono')->nullable()->after('email');
            }
            if (!Schema::hasColumn('persona', 'cargo')) {
                $table->string('cargo')->nullable()->after('telefono');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persona', function (Blueprint $table) {
            if (Schema::hasColumn('persona', 'cargo')) {
                $table->dropColumn('cargo');
            }
            if (Schema::hasColumn('persona', 'telefono')) {
                $table->dropColumn('telefono');
            }
            if (Schema::hasColumn('persona', 'email')) {
                $table->dropColumn('email');
            }
        });
    }
};
