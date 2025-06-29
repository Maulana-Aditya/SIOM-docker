<?php

// database/migrations/2025_06_16_XXXXXX_update_unique_constraint_on_pengaturan_danas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('pengaturan_danas', function (Blueprint $table) {
            $table->dropUnique('pengaturan_danas_user_id_unique'); // atau sesuaikan dengan nama index-nya
            $table->unique(['user_id', 'periode_id']);
        });
    }

    public function down()
    {
        Schema::table('pengaturan_danas', function (Blueprint $table) {
            $table->dropUnique(['user_id', 'periode_id']);
            $table->unique('user_id');
        });
    }
};

