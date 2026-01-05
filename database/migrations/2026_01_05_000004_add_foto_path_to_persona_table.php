<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('persona', function (Blueprint $table) {
            if (!Schema::hasColumn('persona', 'foto_path')) {
                $table->string('foto_path')->nullable()->after('foto');
            }
        });
    }

    public function down()
    {
        Schema::table('persona', function (Blueprint $table) {
            if (Schema::hasColumn('persona', 'foto_path')) {
                $table->dropColumn('foto_path');
            }
        });
    }
};
