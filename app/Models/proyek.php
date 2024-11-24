<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
    protected $fillable = [
        'nama_proyek', 'deskripsi_proyek', 'unggah_file', 'tanggal_mulai',
        'tanggal_selesai', 'catatan', 'status_proyek', 'project_manager', 'anggota_tim',
    ];

    protected $casts = [
        'anggota_tim' => 'array', // Pastikan kolom anggota_tim di-cast sebagai array
    ];

    // Mutator untuk mengubah ID menjadi nama tim
    public function setAnggotaTimAttribute($value)
    {
        // Ambil nama tim berdasarkan ID
        $teamNames = teams::whereIn('id', $value)->pluck('name')->toArray();

        // Simpan nama tim sebagai array
        $this->attributes['anggota_tim'] = json_encode($teamNames);
    }
}
