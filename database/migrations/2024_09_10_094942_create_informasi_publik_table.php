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
        Schema::create('informasi_publik', function (Blueprint $table) {
            $table->id();
            $table->string('ringkasan_informasi');
            $table->string('pejabat_penguasa_informasi');
            $table->string('penanggung_jawab_informasi');
            $table->boolean('bentuk_informasi_cetak')->default(false);
            $table->boolean('bentuk_informasi_digital')->default(false);
            $table->string('jangka_waktu_penyimpanan');
            $table->string('link')->nullable();
            $table->foreignId('kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_public');
    }
};
