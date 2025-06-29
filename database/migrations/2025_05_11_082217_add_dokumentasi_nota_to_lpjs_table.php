<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('lpjs', function (Blueprint $table) {
            // Kolom untuk menyimpan path dokumentasi (JSON array)
            $table->json('dokumentasi_paths')->nullable();
            
            // Kolom untuk menyimpan path nota (JSON array)
            $table->json('nota_paths')->nullable();//
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lpjs', function (Blueprint $table) {
           $table->dropColumn(['dokumentasi_paths', 'nota_paths']); //
        });
    }
};
