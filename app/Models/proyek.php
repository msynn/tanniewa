<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
    use HasFactory;


    protected $fillable = [
        'nama_proyek',
        'deskripsi_proyek',
        'unggah_file',
        'tanggal_mulai',
        'tanggal_selesai',
        'catatan',
        'status_proyek',
        'project_manager',
        'anggota_tim',
    ];

}
