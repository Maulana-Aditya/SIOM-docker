<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengumumans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi')->nullable();
            $table->string('file_path')->nullable(); // path file pengumuman
            $table->timestamps(); // created_at = tanggal unggah
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumumans');
    }
};
