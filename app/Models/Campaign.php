<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. PASTIKAN INI DI-IMPORT
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory; // 2. PASTIKAN BARIS INI ADA DI DALAM CLASS

   protected $fillable = ['user_id', 'title', 'description', 'category', 'image_path', 'status'];

    // Jika campaign memiliki relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}