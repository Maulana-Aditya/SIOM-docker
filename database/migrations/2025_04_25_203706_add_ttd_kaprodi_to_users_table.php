<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTtdKaprodiToUsersTable extends Migration
{
    /**
     * Menjalankan migrasi untuk menambah kolom ttd_kaprodi
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->string('ttd_kaprodi')->nullable(); // Menambah kolom untuk tanda tangan Kaprodi
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
}
