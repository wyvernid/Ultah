<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadFile extends Model
{
    protected $fillable = ['title', 'description', 'file_path', 'file_type', 'sort_order'];

    public function getFileUrlAttribute(): string
    {
        return asset('storage/' . $this->file_path);
    }
}