<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karir extends Model
{
    use HasFactory;

    protected $fillable = ['job', 'keterangan', 'jenis', 'gaji'];
}
