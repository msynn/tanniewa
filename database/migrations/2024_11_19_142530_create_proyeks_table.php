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
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proyek');
            $table->text('deskripsi_proyek');
            $table->string('unggah_file')->nullable(); // Asumsi file path disimpan sebagai string
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status_proyek', ['Berjalan', 'Selesai', 'Ditunda', 'Dibatalkan']); // Sesuaikan opsi dengan kebutuhan
            $table->string('project_manager')->nullable(); // Nama atau ID Project Manager
            $table->json('anggota_tim')->nullable(); // Simpan array anggota tim dalam format JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyeks');
    }
};
