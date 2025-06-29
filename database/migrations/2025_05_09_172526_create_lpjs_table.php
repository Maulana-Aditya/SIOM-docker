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
        Schema::create('lpjs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan');
            $table->string('ormawa');
            $table->string('prodi');
            $table->string('file_proposal');
            $table->foreignId('dibuat_oleh_user_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', [
                'pending_admin',
                'revisi_admin',
                'pending_pembina',
                'revisi_pembina',
                'pending_kaprodi',
                'revisi_kaprodi',
                'pending_kemahasiswaan',
                'revisi_kemahasiswaan',
                'pending_wr3',
                'revisi_wr3',
                'acc_final'
            ])->default('pending_admin');
            $table->foreignId('current_reviewer_id')->nullable()->constrained('users')->onDelete('set null');
            $table->text('catatan_revisi')->nullable();
            $table->string('ttd_pembina')->nullable();
            $table->string('ttd_kemahasiswaan')->nullable();
            $table->string('ttd_kaprodi')->nullable();
            $table->string('ttd_wr3')->nullable();
            $table->string('file_revisi')->nullable();
            $table->integer('total_dana')->default(9000000);
            $table->integer('sisa_dana')->default(9000000);
            $table->integer('total_keseluruhan')->default(0);
            $table->string('file_lpj_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpjs');
    }
};
