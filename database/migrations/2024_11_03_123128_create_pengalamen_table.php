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
        Schema::create('pengalamen', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'projek');
            $table->string(column: 'klien');
            $table->string(column: 'lokasi');
            $table->string(column: 'tahun');
            $table->string(column: 'image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalamen');
    }
};
