<?php

use App\Models\pengaturan;
use App\Models\pengaturans;
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
        Schema::create('pengaturans', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'key');
            $table->string(column: 'label');
            $table->string(column: 'value')->nullable();
            $table->string(column: 'type');
            $table->timestamps();
        });

        pengaturans::create([
            'key' => '_site_name',
            'label'=>'Judul Situs',
            'value'=>'Website Sederhana',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_location',
            'label'=>'Alamat Perusahaan',
            'value'=>'Makassar, Sulawesi Selatan, Indonesia',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_instagram',
            'label'=>'Instagram',
            'value'=>'https://www.youtube.com/@msyn5631',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_facebook',
            'label'=>'Facebook',
            'value'=>'https://www.youtube.com/@msyn5631',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_layanan',
            'label'=>'Layanan',
            'value'=>'Web Design,
                        Web Development,
                        Product Management,
                        Marketing,
                        Graphic Design',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_whatsapp',
            'label'=>'Whatsapp',
            'value'=>'wa.me/+6289525060891',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_email',
            'label'=>'Email',
            'value'=>'Link Email Anda',
            'type'=>'text',
        ]);

        pengaturans::create([
            'key'=>'_legalitas',
            'label'=>'Legalitas',
            'value'=>'12343534673',
            'type'=>'text',
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturans');
    }
};
