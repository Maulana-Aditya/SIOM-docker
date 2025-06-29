<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->constrained()->onDelete('cascade');
        });

        Schema::table('keuangans', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->constrained()->onDelete('cascade');
        });

        Schema::table('absensis', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->constrained()->onDelete('cascade');
        });

        Schema::table('anggotas', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->constrained()->onDelete('cascade');
        });

        Schema::table('pertemuans', function (Blueprint $table) {
            $table->foreignId('periode_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });

        Schema::table('keuangans', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });

        Schema::table('absensis', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });

        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });

        Schema::table('pertemuans', function (Blueprint $table) {
            $table->dropForeign(['periode_id']);
            $table->dropColumn('periode_id');
        });
    }
};

