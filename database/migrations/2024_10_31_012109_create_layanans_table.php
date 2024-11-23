<?php

use App\Models\layanans;
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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'key');
            $table->string(column: 'label');
            $table->string(column: 'value')->nullable();
            $table->string(column: 'type');
            $table->timestamps();
        });

        layanans::create([
            'key'=>'_title',
            'label'=>'Layanan',
            'value'=>'content',
            'type'=>'text',
        ]);

        layanans::create([
            'key'=>'_layanan1',
            'label'=>'Customize Application',
            'value'=>'Anda dapat memesan Aplikasi yang anda inginkan, baik itu di Pemerintahan, Perusahaan atau kebutuhan pribadi anda',
            'type'=>'text',
        ]);

        layanans::create([
            'key'=>'_layanan2',
            'label'=>'Executive Application',
            'value'=>'Executive Information System (EIS) adalah aplikasi yang dimiliki, khususnya untuk menunjang proses pengambilan keputusan',
            'type'=>'text',
        ]);
        layanans::create([
            'key'=>'_layanan3',
            'label'=>'GIS Application',
            'value'=>'Geographic Information System (GIS) adalah suatu sistem informasi yang dirancang untuk bekerja dengan data yang bereferensi spasial atau berkoordinat geograf',
            'type'=>'text',
        ]);
        layanans::create([
            'key'=>'_layanan4',
            'label'=>'Networking',
            'value'=>'Kami dapat melayani pemasangan, pemeliharaan jaringan',
            'type'=>'text',
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
