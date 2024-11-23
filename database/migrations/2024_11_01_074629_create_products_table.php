<?php

use App\Models\products;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'key');
            $table->string(column: 'label');
            $table->string(column: 'value')->nullable();
            $table->string(column: 'type');
            $table->timestamps();
        });

        products::create([
            'key' => '_title',
            'label'=>'Judul Halaman',
            'value'=>'Produk',
            'type'=>'text',
        ]);

        products::create([
            'key' => '_title',
            'label'=>'Jaringan (Networking)',
            'value'=>'
Anda dapat memesan Aplikasi yang anda inginkan, baik itu di Pemerintahan, Perusahaan atau kebutuhan pribadi anda',
            'type'=>'text',
        ]);
        products::create([
            'key' => '_title',
            'label'=>'Pelatihan (Trainning)',
            'value'=>'Kami mengembangkan aplikasai yang menarik dan dinamis. Memperhatikan faktor usability, navigasi dan user friendly sehingga mudah diakses oleh konsumen/pengunjung.',
            'type'=>'text',
        ]);
        products::create([
            'key' => '_title',
            'label'=>'Aplikasi (Application)',
            'value'=>'Selain mengembangkan aplikasi sesuai kebutuhan client kami, kami juga memperhatikan faktor usability salah satunya dengan mengadakan pelatihan kepada clientagar aplikasi yang kami kembangkan bisa maksimal dan sesuai sasaran kebutuhan client kami',
            'type'=>'text',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
