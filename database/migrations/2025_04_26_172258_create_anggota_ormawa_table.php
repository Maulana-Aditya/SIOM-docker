<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota_ormawa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // siapa pembuatnya
            $table->string('nim');
            $table->string('nama');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota_ormawa');
    }
};
