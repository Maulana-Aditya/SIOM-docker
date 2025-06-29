<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('kas_anggotas', function (Blueprint $table) {
            $table->enum('status', ['sudah', 'belum', 'menyicil'])->default('sudah')->after('jumlah');
        });
    }

    public function down(): void
    {
        Schema::table('kas_anggotas', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
