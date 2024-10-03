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
        Schema::create('permohonan_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telepon');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->char('nik', 16);
            $table->string('file_ktp');
            $table->text('informasi_yang_dibutuhkan');
            $table->text('alasan_penggunaan_informasi');
            $table->foreignId('id_memperoleh_informasi');
            $table->foreignId('id_mendapatkan_salinan_informasi');
            $table->foreignId('id_status')->default(1);
            $table->timestamps();
            $table->text('pesan_ditolak')->nullable();
            $table->string('file_acc_permohonan')->nullable();
            $table->boolean('status_pengiriman')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan_informasi');
    }
};
