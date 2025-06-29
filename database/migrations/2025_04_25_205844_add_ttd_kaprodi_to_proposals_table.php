<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
        if (!Schema::hasColumn('proposals', 'ttd_kaprodi')) {
            $table->string('ttd_kaprodi')->nullable(); // Menambahkan Kolom ttd_kaprodi
        }
    });
    }

    /**
     * Membalikkan migrasi
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropColumn('ttd_kaprodi'); // Menghapus kolom ttd_kaprodi jika migrasi dibatalkan
        });
    }
};
