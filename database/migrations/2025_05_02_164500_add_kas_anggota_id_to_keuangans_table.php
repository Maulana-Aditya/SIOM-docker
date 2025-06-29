<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('keuangans', function (Blueprint $table) {
            $table->unsignedBigInteger('kas_anggota_id')->nullable()->after('user_id');

            $table->foreign('kas_anggota_id')
                ->references('id')
                ->on('kas_anggotas')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('keuangans', function (Blueprint $table) {
            $table->dropForeign(['kas_anggota_id']);
            $table->dropColumn('kas_anggota_id');
        });
    }
};

