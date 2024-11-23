<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginGuest extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'NIK' ,'password'];

}
