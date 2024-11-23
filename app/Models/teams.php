<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class teams extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'image' ,'instagram','facebook', 'linkedin'];

    protected static function boot(){
        parent::boot();
        static::updating(function($model){
            if ($model->isDirty('image') && ($model->getOriginal('image') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('image'));
            }
        });
    }
}
