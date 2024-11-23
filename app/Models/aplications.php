<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class aplications extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'content', 'link'];

    protected static function boot(){
        parent::boot();
        static::updating(function($model): void{
            if ($model->isDirty('image') && ($model->getOriginal('image') !== null)) {
                Storage::disk('public')->delete($model->getOriginal('image'));
            }
        });
    }
}
