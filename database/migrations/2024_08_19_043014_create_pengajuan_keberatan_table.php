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
        Schema::create('pengajuan_keberatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_telepon');
            $table->string('pekerjaan');
            $table->text('alamat');
            $table->text('tujuan_penggunaan_informasi');
            $table->foreignId('id_alasan_pengajuan');
            $table->foreignId('id_status')->default(1);
            $table->timestamps();
            $table->text('pesan_ditolak')->nullable();
            $table->string('file_acc_pengajuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_keberatan');
    }
};
