<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{
    protected $fillable = ['title', 'caption', 'photo_path', 'sort_order'];

    public function getPhotoUrlAttribute(): string
    {
        return asset('storage/' . $this->photo_path);
    }
}